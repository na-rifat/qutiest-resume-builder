const footer = $(`footer`);
const nav_menu = footer.find(`.footer-nav`);
const title = nav_menu.find(`h3`);
const nav_contents = nav_menu.find(`nav`);
const dur = 600;

title.on(`click`, function (e) {
    e.preventDefault();

    let self = $(this);
    let self_nav = self.parents(`.footer-nav`);
    let self_menu = self_nav.find(`nav`);

    if (self_nav.hasClass(`expand`)) {
        self_nav.removeClass(`expand`);
        self_menu.slideUp(dur);
    } else {
        nav_menu.removeClass(`expand`);
        nav_contents.slideUp(dur);

        self_nav.addClass(`expand`);
        self_menu.slideDown(dur);
    }
});
