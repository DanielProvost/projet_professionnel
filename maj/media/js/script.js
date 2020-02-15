 var SITE = {};

SITE.installJquery = function ()
{
    jQuery("a.action-delete").on("click", SITE.traiteDeleteAjax);

    jQuery("a.action-delete-img").on("click",SITE.traiteDeleteImgAjax);

    jQuery("a.action-delete-pdf").on("click",SITE.traiteDeletePdfAjax);

    jQuery("a.action-show").on("click", SITE.traiteShowAjax);

    jQuery("a.action-show-Actualite").on("click", SITE.traiteShowActuAjax);

    jQuery("a.action-show-Pages").on("click", SITE.traiteShowPagesAjax);

    jQuery("a.action-show-realisation").on("click", SITE.traiteShowReaAjax);

    jQuery("a.action-show-reference").on("click", SITE.traiteShowRefAjax);

    jQuery("form.ajax").on("submit", SITE.envoyerFichierAjax);

    jQuery("button.dupliquer").on("click", SITE.dupliquerAjax);

    jQuery("input.multiUpload").on("change", SITE.addNeedInputFile);
}

SITE.addNeedInputFile = function (event)
{
    $('#multiUpload').append('<input type="file" name="uploadImg[]" class="multiUpload" /><br>');
    jQuery("input.multiUpload").on("change", SITE.addNeedInputFile);
}

SITE.traiteDeleteAjax = function (event)
{
    event.preventDefault();
    if(confirm('Supprimer cette ligne ?'))
    {
        var table = jQuery(this).attr("data-table");
        var id    = jQuery(this).attr("data-id");
        var requeteGet = "controller=deleteRow&id=" + id + "&table=" + table;
// DEBUG
// alert(requeteGet);
        jQuery(".feedback-"+table).load("traitForm.php?" + requeteGet);

    }
}

SITE.traiteDeleteImgAjax = function (event)
{
    event.preventDefault();
    if(confirm('Supprimer cette image ?'))
    {
        var table = jQuery(this).attr("data-table");
        var id    = jQuery(this).attr("data-id");
        var field = jQuery(this).attr("data-field");
        var requeteGet = "controller=deleteImgRow&id=" + id + "&table=" + table + "&field=" + field;
//DEBUG
//alert(requeteGet);

        jQuery(".feedbackSuppr").load("traitForm.php?" + requeteGet);
    }
}

SITE.traiteDeletePdfAjax = function (event)
{
    event.preventDefault();
    if(confirm('Supprimer ce PDF ?'))
    {
        var table = jQuery(this).attr("data-table");
        var id    = jQuery(this).attr("data-id");
        var requeteGet = "controller=deletePdfRow&id=" + id + "&table=" + table;
//DEBUG
//alert(requeteGet);
        jQuery(".feedbackSuppr").load("traitForm.php?" + requeteGet);

    }
}

SITE.traiteShowAjax = function (event)
{
    event.preventDefault();
    var table = jQuery(this).attr("data-table");
    var id    = jQuery(this).attr("data-id");
    var requeteGet = "id=" + id + "&table=" + table;
// DEBUG
// alert(requeteGet);
    window.location.href =("detail-" + table + ".php?" + requeteGet);
}

SITE.traiteShowActuAjax = function (event)
{
    event.preventDefault();

    var table = jQuery(this).attr("data-table");
    var id    = jQuery(this).attr("data-id");
    var requeteGet = "id=" + id + "&table=" + table;
// DEBUG
// alert(requeteGet);
    window.location.href =("detail-actualite.php?" + requeteGet);
}
SITE.traiteShowPagesAjax = function (event)
{
    event.preventDefault();
    var table = jQuery(this).attr("data-table");
    var id    = jQuery(this).attr("data-id");
    var requeteGet = "id=" + id + "&table=" + table;
// DEBUG
//     alert(requeteGet);
    window.location.href =("detail-page.php?" + requeteGet);
}

SITE.traiteShowReaAjax = function (event)
{
    event.preventDefault();
    var table = jQuery(this).attr("data-table");
    var id    = jQuery(this).attr("data-id");
    var requeteGet = "id=" + id + "&table=" + table;
//DEBUG
//alert(requeteGet);
    window.location.href =("detail-realisation.php?" + requeteGet);
}

SITE.traiteShowRefAjax = function (event)
{
    event.preventDefault();
    var table = jQuery(this).attr("data-table");
    var id    = jQuery(this).attr("data-id");
    var requeteGet = "id=" + id + "&table=" + table;
//DEBUG
//alert(requeteGet);
    window.location.href =("detail-reference.php?" + requeteGet);
}

SITE.envoyerFichierAjax = function (event)
{
    event.preventDefault();
    tinyMCE.triggerSave();
    var data = new FormData(jQuery(this).get(0));
    jQuery.ajax({
        url:            'traitForm.php',     // $form.attr('action'),
        type:           'POST',              // $form.attr('method'),
        contentType:    false,               // obligatoire pour de l'upload
        processData:    false,               // obligatoire pour de l'upload
        dataType:       'html',              // 'json', // selon le retour attendu
        // ON LIE LES INFOS DU FORMULAIRE DANS LA REQUETE AJAX
        data:           data,
        // FONCTION A ACTIVER QUAND LE NAVIGATEUR RECOIT LA REPONSE DU SERVEUR
        success:        SITE.feedbackAjax
     });
}

SITE.dupliquerAjax = function (event)
{
    //event.preventDefault();
    if(confirm('Dupliquer ces données ?'))
    {
        //event.preventDefault();
        var detail = '';
        var table = jQuery(this).attr("data-table");
        var id    = jQuery(this).attr("data-id");
        if (table=='Actualite'){
        	detail='actualite';
        }
        var requeteGet = "id=" + id + "&table=" + table + "&dpl=1";
    //DEBUG
    //alert(requeteGet);
        window.location.href =("detail-"+detail+".php?" + requeteGet);
    }
}


SITE.feedbackAjax = function (response)
{
    jQuery(".feedback").html(response);
}

jQuery(SITE.installJquery);
