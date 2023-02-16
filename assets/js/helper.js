function show_modal(content)
{
    var $modal_container = $('div#modal-container');
    var $modal_content   = $modal_container.find('.modal-content');
    $modal_content.html(content);

    $modal_container.modal('show');
}