jQuery(document).ready(function($) {
    
    // Mobile Menu Toggle
    $('.menu-toggle').on('click', function(e) {
        e.preventDefault();
        $('.main-navigation').toggleClass('active');
        $(this).find('i').toggleClass('fa-bars fa-xmark');
    });

    // Close mobile menu when a link is clicked
    $('.main-navigation a').on('click', function() {
        $('.main-navigation').removeClass('active');
        $('.menu-toggle i').removeClass('fa-xmark').addClass('fa-bars');
    });

    // Sticky Header scroll effect
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.site-header').css('box-shadow', '0 10px 30px rgba(0,0,0,0.5)');
        } else {
            $('.site-header').css('box-shadow', 'none');
        }
    });

    // ====================================================
    // AJAX Form Handling with Validation + Motorcycle Animation
    // ====================================================
    $('.dnz-ajax-form').on('submit', function(e) {
        e.preventDefault();
        
        var $form = $(this);
        var $btn = $form.find('.submit-btn');
        var $response = $form.find('.form-response');
        
        // Reset response
        $response.removeClass('success error').hide().text('');

        // ---- CLIENT-SIDE VALIDATION ----
        var isValid = true;
        var errorMsg = '';

        // Phone validation: only digits, spaces, + allowed, min 10 chars
        var phoneField = $form.find('input[name="phone"]');
        if (phoneField.length && phoneField.val()) {
            var phone = phoneField.val().replace(/[\s\-\(\)]/g, '');
            if (!/^[\+]?[0-9]{10,13}$/.test(phone)) {
                isValid = false;
                errorMsg = 'Lütfen geçerli bir telefon numarası girin (sadece rakam, min. 10 hane).';
                phoneField.css('border-color', '#ef4444');
            } else {
                phoneField.css('border-color', '');
            }
        }

        // Email validation
        var emailField = $form.find('input[name="email"]');
        if (emailField.length && emailField.val() && emailField.prop('required')) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailField.val())) {
                isValid = false;
                errorMsg = 'Lütfen geçerli bir e-posta adresi girin.';
                emailField.css('border-color', '#ef4444');
            } else {
                emailField.css('border-color', '');
            }
        }

        // Age validation (if present)
        var ageField = $form.find('input[name="age"]');
        if (ageField.length && ageField.val()) {
            var age = parseInt(ageField.val());
            if (isNaN(age) || age < 18 || age > 65) {
                isValid = false;
                errorMsg = 'Yaş 18 ile 65 arasında olmalıdır.';
                ageField.css('border-color', '#ef4444');
            } else {
                ageField.css('border-color', '');
            }
        }

        // Name: no numbers allowed
        var nameField = $form.find('input[name="name"]');
        if (nameField.length && nameField.val()) {
            if (/[0-9]/.test(nameField.val())) {
                isValid = false;
                errorMsg = 'İsim alanına rakam girilemez.';
                nameField.css('border-color', '#ef4444');
            } else {
                nameField.css('border-color', '');
            }
        }

        if (!isValid) {
            $response.addClass('error').html('<i class="fa-solid fa-circle-exclamation"></i> ' + errorMsg).slideDown();
            return;
        }
        // ---- END VALIDATION ----
        
        // Motorcycle animation on button
        var btnText = $btn.html();
        $btn.html('<span class="moto-anim"><i class="fa-solid fa-motorcycle"></i></span> Gönderiliyor...').prop('disabled', true);
        $btn.addClass('submitting');
        
        var formData = $form.serialize();
        formData += '&action=dnz_process_form';
        
        $.ajax({
            url: dnz_ajax.ajax_url,
            type: 'POST',
            data: formData,
            success: function(res) {
                $btn.removeClass('submitting');
                if(res.success) {
                    // Success animation
                    $btn.html('<i class="fa-solid fa-circle-check"></i> Başarılı!').addClass('btn-success-anim');
                    $response.addClass('success').html('<i class="fa-solid fa-circle-check"></i> ' + res.data.message).slideDown();
                    $form[0].reset();
                    setTimeout(function() {
                        $btn.html(btnText).removeClass('btn-success-anim').prop('disabled', false);
                    }, 3000);
                } else {
                    $response.addClass('error').html('<i class="fa-solid fa-circle-exclamation"></i> ' + res.data.message).slideDown();
                    $btn.html(btnText).prop('disabled', false);
                }
            },
            error: function() {
                $btn.removeClass('submitting');
                $response.addClass('error').html('<i class="fa-solid fa-circle-exclamation"></i> Sunucu hatası oluştu. Lütfen tekrar deneyin.').slideDown();
                $btn.html(btnText).prop('disabled', false);
            }
        });
    });

    // ====================================================
    // GSAP Animations
    // ====================================================
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);
        
        gsap.utils.toArray('.gs-reveal-up').forEach(function(elem) {
            gsap.fromTo(elem, 
                { y: 50, opacity: 0 }, 
                {
                    y: 0, opacity: 1, duration: 1, ease: "power3.out",
                    scrollTrigger: { trigger: elem, start: "top 85%", toggleActions: "play none none none" }
                }
            );
        });

        gsap.utils.toArray('.gs-reveal').forEach(function(elem) {
            gsap.fromTo(elem, 
                { scale: 0.95, opacity: 0 }, 
                {
                    scale: 1, opacity: 1, duration: 1.2, ease: "power2.out",
                    scrollTrigger: { trigger: elem, start: "top 85%" }
                }
            );
        });
    }

    // ====================================================
    // Vanilla Tilt initialization
    // ====================================================
    if (typeof VanillaTilt !== 'undefined') {
        var tiltElements = document.querySelectorAll("[data-tilt]");
        if(tiltElements.length > 0) {
            VanillaTilt.init(tiltElements);
        }
    }

    // ====================================================
    // TYPEWRITER EFFECT (for front page hero)
    // ====================================================
    var heroText = document.getElementById('hero-typewriter');
    if (heroText) {
        var fullText = 'Hızlı, Güvenilir, Yanınızda.';
        var charIndex = 0;

        var cursor = document.createElement('span');
        cursor.className = 'typewriter-cursor';
        heroText.appendChild(cursor);

        function type() {
            if (charIndex < fullText.length) {
                heroText.insertBefore(document.createTextNode(fullText.charAt(charIndex)), cursor);
                charIndex++;
                var speed = fullText.charAt(charIndex - 1) === ',' ? 280 : Math.random() * 60 + 60;
                setTimeout(type, speed);
            } else {
                setTimeout(function() { cursor.style.opacity = '0.3'; }, 1200);
            }
        }
        setTimeout(type, 600);
    }

    // ====================================================
    // ANIMATED COUNTER (for stats section)
    // ====================================================
    function animateCounter(el) {
        var target = parseInt(el.getAttribute('data-target'));
        var suffix = el.getAttribute('data-suffix') || '';
        var prefix = el.getAttribute('data-prefix') || '';
        var duration = 2200;
        var startTime = performance.now();

        function updateCounter(currentTime) {
            var elapsed = currentTime - startTime;
            var progress = Math.min(elapsed / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 3);
            var current = Math.floor(eased * target);

            var display;
            if (target >= 1000) {
                display = (current >= 1000) ? (current / 1000).toFixed(current % 1000 === 0 ? 0 : 1) + 'K' : current;
            } else {
                display = current;
            }

            el.textContent = prefix + display + suffix;

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            }
        }
        requestAnimationFrame(updateCounter);
    }

    var statNumbers = document.querySelectorAll('.stat-number[data-target]');
    if (statNumbers.length > 0) {
        var statsObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting && !entry.target.dataset.counted) {
                    entry.target.dataset.counted = '1';
                    animateCounter(entry.target);
                }
            });
        }, { threshold: 0.5 });

        statNumbers.forEach(function(el) { statsObserver.observe(el); });
    }
});
