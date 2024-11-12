import { formatNumber, cleanNumber, formatInputs } from './utils';

$(document).ready(function() {
    calcProduitsExploitation();
    calcChargesExploitation();
    calcCharges();
    calcDivers();
    formatInputs();
})

function calcProduitsExploitation(){
    $('[data-role="Produits exploitation"]').on('blur', function() {
        let values_n_1 = $('[data-role="Produits exploitation"][data-year="n-1"]').map(function() {
            return parseFloat($(this).val().replace(",", ".")) || 0;
        }).get()

        let values_n = $('[data-role="Produits exploitation"][data-year="n"]').map(function() {
            return parseFloat($(this).val().replace(",", ".")) || 0;
        }).get()

        let sum_n_1 = values_n_1.reduce((a, b) => a + b, 0)
        let sum_n = values_n.reduce((a, b) => a + b, 0)

        $('#resultats_total_produits_dexploitation_n-1').val(formatNumber(sum_n_1));
        $('#resultats_total_produits_dexploitation_n').val(formatNumber(sum_n));
    })
}

function calcChargesExploitation(){
    $('[data-role="Charges exploitation"]').on('blur', function() {
        let values_n_1 = $('[data-role="Charges exploitation"][data-year="n-1"]').map(function() {
            return parseFloat($(this).val().replace(",", ".")) || 0;
        }).get()

        let values_n = $('[data-role="Charges exploitation"][data-year="n"]').map(function() {
            return parseFloat($(this).val().replace(",", ".")) || 0;
        }).get()

        let sum_n_1 = values_n_1.reduce((a, b) => a + b, 0)
        let sum_n = values_n.reduce((a, b) => a + b, 0)

        $('#resultats_total_charges_dexploitation_n-1').val(formatNumber(sum_n_1));
        $('#resultats_total_charges_dexploitation_n').val(formatNumber(sum_n));
    })
}

function calcCharges(){
    $('[data-role^="Activites ordinaires"]').on('blur', function(){
        let values_n_1 = $('[data-role^="Activites ordinaires"][data-year="n-1"]').map(function() {
            let value = parseFloat($(this).val().replace(",", ".")) || 0;
            return $(this).data('role').includes('gains') ? -value : value; 
        }).get();

        let values_n = $('[data-role^="Activites ordinaires"][data-year="n"]').map(function() {
            let value = parseFloat($(this).val().replace(",", ".")) || 0;
            return $(this).data('role').includes('gains') ? -value : value; 
        }).get();
        
        let sum_n_1 = values_n_1.reduce((a, b) => a + b, 0);
        let sum_n = values_n.reduce((a, b) => a + b, 0);

        $('#resultats_résultat_des_activités_ordinaires_avant_impôt_n-1').val(formatNumber(sum_n_1));
        $('#resultats_résultat_des_activités_ordinaires_avant_impôt_n').val(formatNumber(sum_n));  
    })
}

function calcDivers(){
    $('[data-role^="Activites ordinaires"], [data-role="Charges exploitation"], [data-role="Produits exploitation"]').on('blur', function(){

        let total_produits_exploitation_n_1 = parseFloat(cleanNumber($('#resultats_total_produits_dexploitation_n-1').val().replace(",", "."))) || 0
        let total_charges_exploitation_n_1 = parseFloat(cleanNumber($('#resultats_total_charges_dexploitation_n-1').val().replace(",", "."))) || 0

        let resultats_exploitation_n_1 = total_produits_exploitation_n_1 - total_charges_exploitation_n_1;
        $('#resultats_résultat_dexploitation__n-1').val(formatNumber(resultats_exploitation_n_1));

        let total_produits_exploitation_n = parseFloat(cleanNumber($('#resultats_total_produits_dexploitation_n').val().replace(",", "."))) || 0
        let total_charges_exploitation_n = parseFloat(cleanNumber($('#resultats_total_charges_dexploitation_n').val().replace(",", "."))) || 0

        let resultats_exploitation_n = total_produits_exploitation_n - total_charges_exploitation_n;

        $('#resultats_résultat_dexploitation__n').val(formatNumber(resultats_exploitation_n));  
    })
}