export function initForm() {
     const form = document.querySelector('[data-form]');
     const formInputs = document.querySelectorAll('[data-form-input]');
     const formBtn = document.querySelector('[data-form-btn]');
     const statusEl = document.querySelector('[data-form-status]');
     const cfg = window.PORTFOLIO_CONFIG || {};

     if (!form || !formBtn) return;

     const serviceId = form.dataset.emailjsService || cfg.emailJsServiceId || '';
     const templateId = form.dataset.emailjsTemplate || cfg.emailJsTemplateId || '';
     const publicKey = form.dataset.emailjsPublic || cfg.emailJsPublicKey || '';
     const receiver = form.dataset.contactEmail || cfg.contactReceiverEmail || '';
     const emailJsEnabled = Boolean(serviceId && templateId && publicKey && receiver);
     let isSubmitting = false;
     let emailJsInitialized = false;

     const setStatus = (type, text) => {
          if (!statusEl) return;
          statusEl.className = `form-status ${type}`;
          statusEl.innerHTML = `<p>${text}</p>`;
     };

     const setSubmitting = (state) => {
          isSubmitting = state;
          const label = formBtn.querySelector('span');
          if (label) {
               label.textContent = state ? 'Sending...' : 'Send Message';
          }
     };

     const toggleSubmit = () => {
          if (!emailJsEnabled || isSubmitting) {
               formBtn.setAttribute('disabled', '');
               return;
          }

          if (form.checkValidity()) {
               formBtn.removeAttribute('disabled');
          } else {
               formBtn.setAttribute('disabled', '');
          }
     };

     formInputs.forEach((input) => {
          input.addEventListener('input', toggleSubmit);
     });

     toggleSubmit();

     if (!emailJsEnabled) {
          setStatus('error-message', 'Email service is not configured yet. Please set EmailJS keys in environment variables.');
     }

     form.addEventListener('submit', async (event) => {
          event.preventDefault();

          if (!emailJsEnabled) {
               setStatus('error-message', 'Email service is not configured yet. Please try again after EmailJS setup.');
               return;
          }

          if (!form.checkValidity()) {
               setStatus('error-message', 'Please fill in all required fields correctly.');
               return;
          }

          const honeypot = form.querySelector('#company');
          if (honeypot && honeypot.value.trim() !== '') {
               setStatus('error-message', 'Spam detected.');
               return;
          }

          const fullName = form.querySelector('#fullname')?.value.trim() || '';
          const email = form.querySelector('#email')?.value.trim() || '';
          const message = form.querySelector('#message')?.value.trim() || '';
          const subject = `Portfolio inquiry from ${fullName}`;

          setSubmitting(true);
          toggleSubmit();

          try {
               if (window.emailjs && typeof window.emailjs.send === 'function') {
                    if (!emailJsInitialized) {
                         window.emailjs.init({ publicKey });
                         emailJsInitialized = true;
                    }

                    await window.emailjs.send(serviceId, templateId, {
                         from_name: fullName,
                         from_email: email,
                         reply_to: email,
                         subject,
                         message,
                         to_email: receiver,
                         to_name: 'Dev Davda',
                         sent_at: new Date().toISOString()
                    });

                    setStatus('success-message', `Thank you, ${fullName}! Your message was sent successfully.`);
                    form.reset();
               } else {
                    throw new Error('EmailJS library was not loaded.');
               }
          } catch (error) {
               setStatus('error-message', 'Unable to send right now. Please try again in a moment.');
          } finally {
               setSubmitting(false);
               toggleSubmit();
          }
     });
}
