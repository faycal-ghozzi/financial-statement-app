import { formatNumber, cleanNumber, formatInputs } from './utils';

const ANC_IDS = '#actifs_immobilisations_incorporelles_n-1, #actifs_immobilisations_incorporelles_n, #actifs_amortissements_-_immobilisations_incorporelles_n-1,  #actifs_amortissements_-_immobilisations_incorporelles_n, #actifs_immobilisations_corporelles_n-1, #actifs_immobilisations_corporelles_n, #actifs_amortissements_-_immobilisations_corporelles_n-1, #actifs_amortissements_-_immobilisations_corporelles_n, #actifs_immobilisations_financières_n-1, #actifs_immobilisations_financières_n, #actifs_provisions_-_immobilisations_financières_n-1, #actifs_provisions_-_immobilisations_financières_n'; 

const AC_IDS = '#actifs_stocks_n-1, #actifs_stocks_n, #actifs_provisions_-_stocks_n-1, #actifs_provisions_-_stocks_n, #actifs_clients_et_comptes_rattachés_n-1, #actifs_clients_et_comptes_rattachés_n, #actifs_provisions_-_clients_et_comptes_rattachés_n-1, #actifs_provisions_-_clients_et_comptes_rattachés_n, #actifs_autres_actifs_courants_n-1, #actifs_autres_actifs_courants_n, #actifs_placements_et_autres_actifs_financiers_n-1, #actifs_placements_et_autres_actifs_financiers_n, #actifs_liquidités_et_équivalents_de_liquidités_n-1, #actifs_liquidités_et_équivalents_de_liquidités_n';

$(document).ready(function() {
    calcANC();
    calcAC();
    calcActifs();
    formatInputs();
});

function calcANC(){
    $(ANC_IDS).on('blur', function() {
        const immobilisations_incorporelles_n_1 = parseFloat(cleanNumber($('#actifs_immobilisations_incorporelles_n-1').val())) || 0;
        const amortissements_immobilisations_incorporelles_n_1 = parseFloat(cleanNumber($('#actifs_amortissements_-_immobilisations_incorporelles_n-1').val())) || 0;
        const immobilisations_corporelles_n_1 = parseFloat(cleanNumber($('#actifs_immobilisations_corporelles_n-1').val())) || 0;
        const amortissements_immobilisations_corporelles_n_1 = parseFloat(cleanNumber($('#actifs_amortissements_-_immobilisations_corporelles_n-1').val())) || 0;
        const immobilisations_financieres_n_1 = parseFloat(cleanNumber($('#actifs_immobilisations_financières_n-1').val())) || 0;
        const provisions_immobilisations_financieres_n_1 = parseFloat(cleanNumber($('#actifs_provisions_-_immobilisations_financières_n-1').val())) || 0;

        const immobilisations_incorporelles_n = parseFloat(cleanNumber($('#actifs_immobilisations_incorporelles_n').val())) || 0;
        const amortissements_immobilisations_incorporelles_n = parseFloat(cleanNumber($('#actifs_amortissements_-_immobilisations_incorporelles_n').val())) || 0;
        const immobilisations_corporelles_n = parseFloat(cleanNumber($('#actifs_immobilisations_corporelles_n').val())) || 0;
        const amortissements_immobilisations_corporelles_n = parseFloat(cleanNumber($('#actifs_amortissements_-_immobilisations_corporelles_n').val())) || 0;
        const immobilisations_financieres_n = parseFloat(cleanNumber($('#actifs_immobilisations_financières_n').val())) || 0;
        const provisions_immobilisations_financieres_n = parseFloat(cleanNumber($('#actifs_provisions_-_immobilisations_financières_n').val())) || 0;

        const total_incorporelles_n_1 = immobilisations_incorporelles_n_1 - amortissements_immobilisations_incorporelles_n_1;
        const total_corporelles_n_1 = immobilisations_corporelles_n_1 - amortissements_immobilisations_corporelles_n_1;
        const total_financieres_n_1 = immobilisations_financieres_n_1 - provisions_immobilisations_financieres_n_1;

        const total_anc_n_1 = total_incorporelles_n_1 + total_corporelles_n_1 + total_financieres_n_1;

        const total_incorporelles_n = immobilisations_incorporelles_n - amortissements_immobilisations_incorporelles_n;
        const total_corporelles_n = immobilisations_corporelles_n - amortissements_immobilisations_corporelles_n;
        const total_financieres_n = immobilisations_financieres_n - provisions_immobilisations_financieres_n;

        const total_anc_n = total_incorporelles_n + total_corporelles_n + total_financieres_n;

        $('#actifs_amortissements_-_immobilisations_incorporelles_n-1_result').val(formatNumber(total_incorporelles_n_1));
        $('#actifs_amortissements_-_immobilisations_corporelles_n-1_result').val(formatNumber(total_corporelles_n_1));
        $('#actifs_provisions_-_immobilisations_financières_n-1_result').val(formatNumber(total_financieres_n_1));

        $('#actifs_total_des_actifs_non_courants_n-1').val(formatNumber(total_anc_n_1));

        $('#actifs_amortissements_-_immobilisations_incorporelles_n_result').val(formatNumber(total_incorporelles_n));
        $('#actifs_amortissements_-_immobilisations_corporelles_n_result').val(formatNumber(total_corporelles_n));
        $('#actifs_provisions_-_immobilisations_financières_n_result').val(formatNumber(total_financieres_n));

        $('#actifs_total_des_actifs_non_courants_n').val(formatNumber(total_anc_n));
    });
}

function calcAC(){
    $(AC_IDS).on('blur', function() {
        const stocks_n_1 = parseFloat(cleanNumber($('#actifs_stocks_n-1').val())) || 0;
        const provisions_stocks_n_1 = parseFloat(cleanNumber($('#actifs_provisions_-_stocks_n-1').val())) || 0;
        const client_et_comptes_n_1 = parseFloat(cleanNumber($('#actifs_clients_et_comptes_rattachés_n-1').val())) || 0;
        const provisions_client_et_comptes_n_1 = parseFloat(cleanNumber($('#actifs_provisions_-_clients_et_comptes_rattachés_n-1').val())) || 0;
        const autres_actifs_courants_n_1 = parseFloat(cleanNumber($('#actifs_autres_actifs_courants_n-1').val())) || 0;
        const placements_n_1 = parseFloat(cleanNumber($('#actifs_placements_et_autres_actifs_financiers_n-1').val())) || 0;
        const liquidites_n_1 = parseFloat(cleanNumber($('#actifs_liquidités_et_équivalents_de_liquidités_n-1').val())) || 0;

        const stocks_n = parseFloat(cleanNumber($('#actifs_stocks_n').val())) || 0;
        const provisions_stocks_n = parseFloat(cleanNumber($('#actifs_provisions_-_stocks_n').val())) || 0;
        const client_et_comptes_n = parseFloat(cleanNumber($('#actifs_clients_et_comptes_rattachés_n').val())) || 0;
        const provisions_client_et_comptes_n = parseFloat(cleanNumber($('#actifs_provisions_-_clients_et_comptes_rattachés_n').val())) || 0;
        const autres_actifs_courants_n = parseFloat(cleanNumber($('#actifs_autres_actifs_courants_n').val())) || 0;
        const placements_n = parseFloat(cleanNumber($('#actifs_placements_et_autres_actifs_financiers_n').val())) || 0;
        const liquidites_n = parseFloat(cleanNumber($('#actifs_liquidités_et_équivalents_de_liquidités_n').val())) || 0;

        const total_stock_n_1 = stocks_n_1 - provisions_stocks_n_1;
        const total_clients_n_1 = client_et_comptes_n_1 - provisions_client_et_comptes_n_1;

        const total_ac_n_1 = total_stock_n_1 + total_clients_n_1 + autres_actifs_courants_n_1 + placements_n_1 + liquidites_n_1


        const total_stock_n = stocks_n - provisions_stocks_n;
        const total_clients_n = client_et_comptes_n - provisions_client_et_comptes_n;

        const total_ac_n = total_stock_n + total_clients_n + autres_actifs_courants_n + placements_n + liquidites_n

        $('#actifs_provisions_-_stocks_n-1_result').val(formatNumber(total_stock_n_1));
        $('#actifs_provisions_-_clients_et_comptes_rattachés_n-1_result').val(formatNumber(total_clients_n_1));

        $('#actifs_total_des_actifs_courants_n-1').val(formatNumber(total_ac_n_1))


        $('#actifs_provisions_-_stocks_n_result').val(formatNumber(total_stock_n));
        $('#actifs_provisions_-_clients_et_comptes_rattachés_n_result').val(formatNumber(total_clients_n));

        $('#actifs_total_des_actifs_courants_n').val(formatNumber(total_ac_n))
    })
}

function calcActifs(){
    $(ANC_IDS+','+AC_IDS).on('blur', function(){
        const total_des_actifs_non_courants_n_1 = parseFloat(cleanNumber($('#actifs_total_des_actifs_non_courants_n-1').val())) || 0;
        const total_des_actifs_courants_n_1 = parseFloat(cleanNumber($('#actifs_total_des_actifs_courants_n-1').val())) || 0;

        const total_des_actifs_non_courants_n = parseFloat(cleanNumber($('#actifs_total_des_actifs_non_courants_n').val())) || 0;
        const total_des_actifs_courants_n = parseFloat(cleanNumber($('#actifs_total_des_actifs_courants_n').val())) || 0;

        const total_actifs_n_1 = total_des_actifs_courants_n_1 + total_des_actifs_non_courants_n_1;
        $('#actifs_total_des_actifs_n-1').val(formatNumber(total_actifs_n_1))

        const total_actifs_n = total_des_actifs_courants_n + total_des_actifs_non_courants_n;
        $('#actifs_total_des_actifs_n').val(formatNumber(total_actifs_n))
    })
}

