$(document).ready(function () {
    var i = 1;
    $('#add-field').click(function () {
        i++;
        $('#dynamic-field').append('' +
            '<div class="row" id="row' + i + '">' +
            '<div class="col">' +
            '<label>Prenom Cpe :</label>' +
            '<input type="text" name="specification[cpePrenom][]" required class="form-control"/>' +
            '</div>' +
            '<div class="col">' +
            '<label>Nom Cpe :</label>' +
            '<input type="text" name="specification[cpeNom][]" required class="form-control"/>' +
            '</div>' +
            '<div class="col">' +
            '<label>Ajout Cpe :</label>' +
            '<br/>' +
            '<button type="button" name="remove" id="' + i + '" class="btn btn-outline-danger remove-field"><i class="far fa-minus-square"></i></button>' +
            '</div>' +
            '<br/>' +
            '</div>');
    });
    $(document).on('click', '.remove-field', function () {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
});






$(document).ready(function () {
    var i = 1;
    $('#add-fields').click(function () {
        i++;
        $('#dynamic-fields').append('' +
            '<div class="row" id="row' + i + '">' +
            '<div class="col">' +
            '<label>Prenom Cpe :</label>' +
            '<input type="text" name="specification[cpePrenom][]" required class="form-control"/>' +
            '</div>' +
            '<div class="col">' +
            '<label>Nom Cpe :</label>' +
            '<input type="text" name="specification[cpeNom][]" required class="form-control"/>' +
            '</div>' +
            '<div class="col">' +
            '<label>Ajout Cpe :</label>' +
            '<br/>' +
            '<button type="button" name="remove" id="' + i + '" class="btn btn-outline-danger remove-field"><i class="far fa-minus-square"></i></button>' +
            '</div>' +
            '<br/>' +
            '</div>');
    });
    $(document).on('click', '.remove-field', function () {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
});





















