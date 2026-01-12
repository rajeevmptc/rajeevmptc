function load_home() {
    document.getElementById("content").innerHTML='<object width="100%" height="100%" type="text/html" data="source/home.html" ></object>';
}

function load_ooptheory() {
    document.getElementById("content").innerHTML='<object width="100%" height="100%" type="text/html" data="source/ooptheory.html" ></object>';
}

function load_oooplab() {
    document.getElementById("content").innerHTML='<object width="100%" height="100%" type="text/html" data="source/ooplab.html" ></object>';
}

function load_minor() {
    document.getElementById("content").innerHTML='<object width="100%" height="100%" type="text/html" data="source/minor.html" ></object>';
}

document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.querySelector('.nav-toggle');
    const navMenu = document.getElementById('nav');

    if (navToggle && navMenu) {
        
        // Function to collapse the entire mobile menu (HIDES the main UL)
        const collapseMainMenu = () => {
            // Ensure we are on a small screen and the menu is currently open
            if (window.innerWidth <= 768 && navMenu.classList.contains('nav-menu--open')) {
                navMenu.classList.remove('nav-menu--open');
                navToggle.setAttribute('aria-expanded', false);
                
                // Also close any currently open submenus (optional, but cleaner)
                document.querySelectorAll('#nav li.item--open').forEach(li => {
                    li.classList.remove('item--open');
                });
            }
        };

        // 1. Main Navigation Toggle Logic (Hamburger Icon)
        navToggle.addEventListener('click', function() {
            navMenu.classList.toggle('nav-menu--open');
            const isExpanded = navMenu.classList.contains('nav-menu--open');
            navToggle.setAttribute('aria-expanded', isExpanded);
        });

        // 2. Submenu Toggle Logic for Mobile (Parent Links)
        const parentMenuItems = navMenu.querySelectorAll('li.top:has(ul.sub)');

        parentMenuItems.forEach(parentLi => {
            const mainLink = parentLi.querySelector('a.top_link');
            
            if (mainLink) {
                mainLink.addEventListener('click', function(e) {
                    if (window.innerWidth <= 768) {
                        
                        // Prevent default navigation for all parent links
                        // as their primary role on mobile is to toggle the submenu.
                        e.preventDefault(); 
                        
                        // Toggle the submenu state
                        parentLi.classList.toggle('item--open');

                        // Collapse other open submenus
                        parentMenuItems.forEach(otherLi => {
                            if (otherLi !== parentLi && otherLi.classList.contains('item--open')) {
                                otherLi.classList.remove('item--open');
                            }
                        });
                    }
                });
            }
        });

        // 3. CRITICAL FIX: Collapse Menu When Any Navigational Link is Clicked
        //    This targets: 
        //    a) Top-level links without submenus (e.g., Home, About Us)
        //    b) All links inside submenus (leaf links)
        const navigationalLinks = navMenu.querySelectorAll('li:not(:has(ul.sub)) > a, ul.sub a');

        navigationalLinks.forEach(link => {
            link.addEventListener('click', function() {
                // Wait a moment to ensure the content loading/navigation begins before hiding the menu
                setTimeout(collapseMainMenu, 50); 
            });
        });
    }
});
