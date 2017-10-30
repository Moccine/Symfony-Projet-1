$(document).ready(function () {
    // On récupère la balise <div> en question qui contient
    // l'attribut « data-prototype » qui nous intéresse. #appbundle_slider_texte
       var $container = $('div#appbundle_slider_texte');

    // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
    var index = $container.find(':input').length;
    var newWidget = $container.attr('data-prototype');
    newWidget.replace(/__name__/g, index);

    // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.

    $('#add-another-email').on('click', function(e) {
        e.preventDefault();
        addAttachment($container);
    });

    // On ajoute un premier champ automatiquement s'il n'en existe pas déjà un (cas d'une nouvelle annonce par exemple).
    if (index !== 0) {
        $container.children('div').each(function() {
            addDeleteLink($(this));
        });
    }
    // La fonction qui ajoute un formulaire texte
    function addAttachment($container) {
        var template = $container.attr('data-prototype')
            .replace(/__name__label__/g, 'Text n°' + (index + 1))
            .replace(/__name__/g, index)
        ;

        // On crée un objet jquery qui contient ce template
        var $prototype = $(template);

        // On ajoute au prototype un Button de suppression
    addDeleteLink($prototype);

    // On ajoute le prototype modifié à la fin de la balise <div>
    $container.append($prototype);

    // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
    index++;
}
    // La fonction qui ajoute un lien de suppression d'une catégorie
    function addDeleteLink($prototype) {
        // Création du lien
        var $deleteLink = $('<button  class="btn btn-danger btn-block">Supprimer</button>');

        // Ajout du lien
        $prototype.append($deleteLink);

        // Ajout du listener sur le clic du lien pour effectivement supprimer la catégorie
        $deleteLink.click(function(e) {
            e.preventDefault();
            $prototype.remove();
            return false;
        });
    }

});


