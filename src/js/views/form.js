import { setCookie, getCookie, eraseCookie } from "../lib/QtCookie";

const durShort = 300;
const durLong = durShort * 2;
const parent = $(`.resume-form`);
const partial_forms = parent.find(`.form`);

// Hide additional phone
// console.log(partial_forms.length)
partial_forms.find(`#additional_phone`).parents(`.phone-wrapper`).hide(0);

// Step navigation
const steps = parent.find(`.step`);
const tips = steps.find(`.tips`);
const forms = steps.find(`.form`);
const nextForm = tips.find(`.btn-next`);
const nextStep = forms.find(`.btn-next`);

// Initialization
tips.eq(0).fadeIn(durShort);

nextForm.on(`click`, function (e) {
    e.preventDefault();

    let self = $(this);
    let selfStep = self.parents(`.step`);
    let selfTip = selfStep.find(`.tips`);
    let selfForm = selfStep.find(`.form`);

    selfTip.fadeOut(durShort, function (e) {
        selfForm.fadeIn(durLong);
    });
});

nextStep.on(`click`, function (e) {
    e.preventDefault();

    let self = $(this);
    let selfStep = self.parents(`.step`);
    let selfTip = selfStep.find(`.tips`);
    let selfForm = selfStep.find(`.form`);
    let next = steps.eq(selfStep.index() + 1).find(`.tips`);

    console.log(next.length);

    selfTip.fadeOut(0);
    selfForm.fadeOut(durShort, function (e) {
        next.fadeIn(durLong);
    });
});
