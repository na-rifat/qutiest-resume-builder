const durShort = 300;
const durLong = durShort * 2;
const parent = $(`.resume-form`);
const partial_forms = parent.find(`.form`);

// Hide additional phone
partial_forms.find(`#additional_phone`).parents(`.phone-wrapper`).hide(0);

// Step navigation
export const navigationItems = parent.find(`.tips, .form, .summery`);
export const btnPrev = navigationItems.find(`.btn-back`);
export const btnNext = navigationItems.find(`.btn-next`);
export const steps = parent.find(`.step`);

// Initialization
navigationItems.eq(0).fadeIn(durShort).addClass(`current`);
let currentIndex = 0;

// Navigation
btnNext.on(`click`, function (e) {
    e.preventDefault();
});
btnPrev.on(`click`, function (e) {
    e.preventDefault();
});

export function slideNext(incr = 1) {
    let current = navigationItems.eq(currentIndex);
    current
        .fadeOut(durShort, function (e) {
            calNextIndex();

            navigationItems
                .eq(currentIndex)
                .fadeIn(durLong)
                .addClass(`current`);
        })
        .removeClass(`current`);
}

export function slidePrev() {
    let current = navigationItems.eq(currentIndex);
    current
        .fadeOut(durShort, function (e) {
            currentIndex--;
            navigationItems
                .eq(currentIndex)
                .fadeIn(durLong)
                .addClass(`current`);
        })
        .removeClass(`current`);
}

function calNextIndex(incr = 1) {
    let current = navigationItems.eq(currentIndex);

    if (
        current.parents(`.step`).hasClass(`work_experience`) &&
        current.hasClass(`form`) &&
        current.find(`#job_title`).val().length == 0
    ) {
        currentIndex += 2;

        return;
    }

    currentIndex += incr;
}
// Navigation end
