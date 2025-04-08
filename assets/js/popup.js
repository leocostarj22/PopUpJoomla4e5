/**
 * Custom Popup Module for Joomla 4/5
 * @author @leocostadeveloper
 * @copyright Copyright (C) 2025 @leocostadeveloper. All rights reserved.
 */
var CustomPopup = {
    /**
     * Initialize the popup
     * @param {Object} options - Configuration options
     */
    init: function(options) {
        this.options = options || {};
        this.overlay = document.getElementById('custom-popup-overlay');
        this.popup = document.getElementById('custom-popup');
        
        // If popup elements don't exist, exit
        if (!this.overlay || !this.popup) {
            return;
        }
        
        // Check if we should show the popup (based on cookie)
        if (this.options.showOnce && this.getCookie('customPopupShown')) {
            return;
        }
        
        // Show popup after delay
        setTimeout(function() {
            CustomPopup.show();
        }, this.options.delay || 0);
        
        // Add click event to close popup when clicking outside
        this.overlay.addEventListener('click', function(e) {
            if (e.target === CustomPopup.overlay) {
                CustomPopup.close();
            }
        });
        
        // Close on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && CustomPopup.isVisible()) {
                CustomPopup.close();
            }
        });
    },
    
    /**
     * Show the popup
     */
    show: function() {
        // Set cookie if showOnce is enabled
        if (this.options.showOnce) {
            this.setCookie('customPopupShown', '1', this.options.cookieDuration || 7);
        }
        
        // Show the overlay with fade effect
        this.overlay.style.opacity = '0';
        this.overlay.style.display = 'flex';
        
        // Trigger reflow
        void this.overlay.offsetWidth;
        
        // Animate in
        this.overlay.style.opacity = '1';
        
        // Add body class to prevent scrolling
        document.body.classList.add('custom-popup-open');
    },
    
    /**
     * Close the popup
     */
    close: function() {
        if (!this.isVisible()) {
            return;
        }
        
        // Fade out
        this.overlay.style.opacity = '0';
        
        // Hide after animation completes
        setTimeout(function() {
            CustomPopup.overlay.style.display = 'none';
            document.body.classList.remove('custom-popup-open');
        }, 300);
    },
    
    /**
     * Check if popup is visible
     * @return {Boolean}
     */
    isVisible: function() {
        return this.overlay && this.overlay.style.display !== 'none';
    },
    
    /**
     * Set a cookie
     * @param {String} name - Cookie name
     * @param {String} value - Cookie value
     * @param {Number} days - Days until expiration
     */
    setCookie: function(name, value, days) {
        var expires = '';
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = '; expires=' + date.toUTCString();
        }
        document.cookie = name + '=' + value + expires + '; path=/; SameSite=Lax';
    },
    
    /**
     * Get a cookie value
     * @param {String} name - Cookie name
     * @return {String|null} - Cookie value or null if not found
     */
    getCookie: function(name) {
        var nameEQ = name + '=';
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') {
                c = c.substring(1, c.length);
            }
            if (c.indexOf(nameEQ) === 0) {
                return c.substring(nameEQ.length, c.length);
            }
        }
        return null;
    },
    
    /**
     * Delete a cookie
     * @param {String} name - Cookie name
     */
    deleteCookie: function(name) {
        this.setCookie(name, '', -1);
    }
};