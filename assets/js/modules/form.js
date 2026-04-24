export function initForm() {
     const form = document.querySelector('[data-form]');
     const formInputs = document.querySelectorAll('[data-form-input]');
     const formBtn = document.querySelector('[data-form-btn]');
     const statusEl = document.querySelector('[data-form-status]');

     if (!form || !formBtn) return;

     const setStatus = (type, text) => {
          if (!statusEl) return;
          statusEl.className = `form-status ${type}`;
          statusEl.innerHTML = `<p>${text}</p>`;
     };

     const toggleSubmit = () => {
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

     form.addEventListener('submit', async (event) => {
          event.preventDefault();

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

          const cfg = window.PORTFOLIO_CONFIG || {};
          const serviceId = form.dataset.emailjsService || cfg.emailJsServiceId || '';
          const templateId = form.dataset.emailjsTemplate || cfg.emailJsTemplateId || '';
          const publicKey = form.dataset.emailjsPublic || cfg.emailJsPublicKey || '';
          const receiver = form.dataset.contactEmail || cfg.contactReceiverEmail || '';

          formBtn.setAttribute('disabled', '');
          formBtn.querySelector('span').textContent = 'Sending...';

          try {
               if (window.emailjs && serviceId && templateId && publicKey) {
                    window.emailjs.init({ publicKey });

                    await window.emailjs.send(serviceId, templateId, {
                         from_name: fullName,
                         from_email: email,
                         message,
                         to_email: receiver
                    });

                    setStatus('success-message', `Thank you, ${fullName}! Your message was sent successfully.`);
                    form.reset();
               } else {
                    const mailto = `mailto:${encodeURIComponent(receiver)}?subject=${encodeURIComponent(`Portfolio inquiry from ${fullName}`)}&body=${encodeURIComponent(`Name: ${fullName}\nEmail: ${email}\n\n${message}`)}`;
                    window.location.href = mailto;
                    setStatus('success-message', 'Opening your email client to send the message.');
               }
          } catch (error) {
               setStatus('error-message', 'Unable to send right now. Please try again in a moment.');
          } finally {
               formBtn.querySelector('span').textContent = 'Send Message';
               toggleSubmit();
          }
     });
}
