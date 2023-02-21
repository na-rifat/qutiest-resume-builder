export function validate(step) {
    let fields = $(step).find(`input, textarea, select`);
    let goahead = true;

    $.each(fields, function (i, el) {
        let self = $(this);
        let parent = self.parents(`.input`);

        if (self.attr(`required`) && self.val().length == 0) {
            parent.find(`.error`).remove();

            parent.append(`<p class="error">This field is required</p>`);

            let error = parent.find(`.error`);
            error.css({ display: `none` }).fadeIn(600, function (e) {});

            goahead = false;
        }
    });

    return goahead;
}
