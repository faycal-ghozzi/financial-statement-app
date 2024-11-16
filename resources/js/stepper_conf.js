import { formatNumber, cleanNumber, formatInputs } from './utils';

function saveDatatoDB(formData){
    $.ajax({
        type: "POST",
        url: '/financial-statement',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        success: function() {
            console.log('success')
        },
        error: function() {
            console.log('fail')
        }
    })
}

$(document).ready(function() {
    $("#financial-form").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "fade",
        autoFocus: true,
        labels: {
            finish: "Valider",
            next: "Suivant >",
            previous: "< Précédent"
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            if (newIndex < currentIndex) {
                return true;
            }
            return $("#financial-form").valid();
        },
        onFinishing: function (event, currentIndex) {
            console.log('finsihing');
            const total_actifs_n_1 = parseFloat(cleanNumber($('#actifs_total_des_actifs_n-1').val().replace(",", "."))) || 0;
            const total_actifs_n = parseFloat(cleanNumber($('#actifs_total_des_actifs_n').val().replace(",", "."))) || 0;
            
            const total_passifs_n_1 = parseFloat(cleanNumber($('#passifs_total_des_capitaux_propres_et_passifs_n-1').val().replace(",", "."))) || 0;
            const total_passifs_n = parseFloat(cleanNumber($('#passifs_total_des_capitaux_propres_et_passifs_n').val().replace(",", "."))) || 0;

            if(total_actifs_n !== total_passifs_n){
                alert('veillez verifier le bilan de l\'année courante');
            }
            else if(total_actifs_n_1 !== total_passifs_n_1){
                alert('veuillez verifier le bilan de l\'année précedente');
            }else{
                return $("#financial-form").valid();
            }
        },
        onFinished: function (event, currentIndex) {

            $("#financial-form")
                .find(":disabled")
                .each(function () {
                    $(this).data("disabled", true).prop("disabled", false);
                });

            // Serialize form
            const formData = $("#financial-form").serialize();

            // Re-disable the inputs
            $("#financial-form")
                .find(":disabled[data-disabled]")
                .prop("disabled", true)
                .removeData("disabled");

            saveDatatoDB(formData)
            // $("#financial-form").submit();
        },
        onInit: function (event, currentIndex) {
            // Hide "Précédent" on the first step
            $(".actions a[href='#previous']").hide();
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            // Show/Hide "Précédent" button based on the current step
            if (currentIndex === 0) {
                $(".actions a[href='#previous']").hide();
            } else {
                $(".actions a[href='#previous']").show();
            }
        }
    });
});