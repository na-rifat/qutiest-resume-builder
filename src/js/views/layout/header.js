const parent = $(`header`);
const main_menu_wrapper = parent.find(`.main-nav-menu`);
const main_menu = main_menu_wrapper.find(`nav`);
const menu_toggle = main_menu_wrapper.find(`.menu-toggle`);

const mobile_nav = main_menu.find(`.menu-item-has-children`);
const mobile_dropdown = mobile_nav.find(`.dropdown-menu`);
const dur = 600;

$(window).on(`scroll`, function (e) {
    let currentPos = $(this).scrollTop();

    if (currentPos > 0) {
        parent.addClass(`sticky`);
    } else {
        parent.removeClass(`sticky`);
    }
});

// Mobile menu toggle
menu_toggle.on(`click`, function (e) {
    let self = $(this);

    if (main_menu_wrapper.hasClass(`expand`)) {
        main_menu_wrapper.removeClass(`expand`);
    } else {
        main_menu_wrapper.addClass(`expand`);
    }
});

mobile_nav.on(`click`, function (e) {
    e.preventDefault();

    let self = $(this);
    let self_dropdown = self.find(`.dropdown-menu`);
    // self.hide(dur)
    self_dropdown.css({background: `red`})

    if (self.hasClass(`expand-nav`)) {
        self.removeClass(`expand-nav`);
        self_dropdown.slideUp(dur);
    } else {
        main_menu.find(`li.menu-item-has-children`).not(self).removeClass(`expand-nav`);
        main_menu.find(`li.menu-item-has-children`).not(self).find(`.dropdown-menu`).slideUp(dur)
        // mobile_nav.find(`.dropdown-menu`).not(self_dropdown).slideUp(dur);

        self.addClass(`expand-nav`);
        self_dropdown.slideDown(dur);
    }
});
