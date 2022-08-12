//edit, save finish functions
$(".delete-button").prop('disabled', false);
$(".hidden-button").prop('disabled', false);
$('.save-button').on('click', save_onclick);
$('.finish-button').on('click', finish_onclick);
$('.edit-button').on('click', edit_onclick);
$('.save-button, .finish-button').hide();
$(".image_file").hide();

function edit_onclick() {
    setFormMode($(this).closest("form"), 'edit');
    $(".image_file").show();
}

function finish_onclick() {
    setFormMode($(this).closest("form"), 'view');
    // $(this).closest("form").trigger("reset");
    $(".image_file").hide();
}

function save_onclick() {
    setFormMode($(this).closest("form"), 'edit');
    $('.finish-button').show();
}


function setFormMode($form, mode) {
    switch (mode) {
        case 'view':
            $form.find('.save-button, .finish-button').hide();
            $form.find('.edit-button').show();
            $form.find('.delete-button').show();
            $form.find("input").prop('disabled', true);
            $(".delete-button").prop('disabled', false);
            $form.find("input[type=text]").css("color", "royalblue");
            $form.find(".cutomer_image").css("display", "block");
            break;
        case 'edit':
            $form.find('.save-button').show();
            $form.find('.edit-button').hide();
            $form.find('.delete-button').hide();
            $form.find("input").prop("disabled", false);
            $form.find("input[type=text]").focus().css("color", "royalblue");
            $form.find(".cutomer_image").css("display", "none");
            break;
    }
}
  