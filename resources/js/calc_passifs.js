import { formatNumber, cleanNumber, formatInputs } from './utils';

const CP_IDS = "#capitaux_capital_social_n-1, #capitaux_capital_social_n, #capitaux_réserves_légales_n-1, #capitaux_réserves_légales_n, #capitaux_autres_capitaux_propres_n-1, #capitaux_autres_capitaux_propres_n, #capitaux_réserves_spéciales_de_réévaluation_n-1, #capitaux_réserves_spéciales_de_réévaluation_n, #capitaux_résultats_reportés_n-1, #capitaux_résultats_reportés_n, #capitaux_modifications_comptables_n-1, #capitaux_modifications_comptables_n, #capitaux_résultat_de_lexercice_n-1, #capitaux_résultat_de_lexercice_n";

const PNC_IDS = '#passifs_emprunts_n-1, #passifs_emprunts_n, #passifs_provisions_n-1, #passifs_provisions_n, #passifs_autres_passifs_financiers_n-1, #passifs_autres_passifs_financiers_n';

const PC_IDS = '#passifs_fournisseurs_et_comptes_rattachés_n-1, #passifs_fournisseurs_et_comptes_rattachés_n, #passifs_autres_passifs_courants_n-1, #passifs_autres_passifs_courants_n, #passifs_concours_bancaires_et_autres_passifs_financiers_n-1, #passifs_concours_bancaires_et_autres_passifs_financiers_n';

$(document).ready(function(){
    calcCP();
    calcPNC();
    calcPC();
    calcCPetP();
    formatInputs();
})

function calcCP(){
    $(CP_IDS).on('blur', function(){
        const capital_social_n_1 = parseFloat(cleanNumber($('#capitaux_capital_social_n-1').val())) || 0;
        const reserves_legales_n_1 = parseFloat(cleanNumber($('#capitaux_réserves_légales_n-1').val())) || 0;
        const autres_capitaux_propres_n_1 = parseFloat(cleanNumber($('#capitaux_autres_capitaux_propres_n-1').val())) || 0;
        const reserves_speciales_n_1 = parseFloat(cleanNumber($('#capitaux_réserves_spéciales_de_réévaluation_n-1').val())) || 0;
        const resultats_reportes_n_1 = parseFloat(cleanNumber($('#capitaux_résultats_reportés_n-1').val())) || 0;
        const modifications_comptables_n_1 = parseFloat(cleanNumber($('#capitaux_modifications_comptables_n-1').val())) || 0;
        const resultats_exercice_n_1 = parseFloat(cleanNumber($('#capitaux_résultat_de_lexercice_n-1').val())) || 0;

        const capital_social_n = parseFloat(cleanNumber($('#capitaux_capital_social_n').val())) || 0;
        const reserves_legales_n = parseFloat(cleanNumber($('#capitaux_réserves_légales_n').val())) || 0;
        const autres_capitaux_propres_n = parseFloat(cleanNumber($('#capitaux_autres_capitaux_propres_n').val())) || 0;
        const reserves_speciales_n = parseFloat(cleanNumber($('#capitaux_réserves_spéciales_de_réévaluation_n').val())) || 0;
        const resultats_reportes_n = parseFloat(cleanNumber($('#capitaux_résultats_reportés_n').val())) || 0;
        const modifications_comptables_n = parseFloat(cleanNumber($('#capitaux_modifications_comptables_n').val())) || 0;
        const resultats_exercice_n = parseFloat(cleanNumber($('#capitaux_résultat_de_lexercice_n').val())) || 0;

        const total_cp_avant_res_ex_n_1 = capital_social_n_1 + reserves_legales_n_1 + autres_capitaux_propres_n_1 + reserves_speciales_n_1 + resultats_reportes_n_1 + modifications_comptables_n_1;
        const total_cp_n_1 = total_cp_avant_res_ex_n_1 + resultats_exercice_n_1;

        const total_cp_avant_res_ex_n = capital_social_n + reserves_legales_n + autres_capitaux_propres_n + reserves_speciales_n + resultats_reportes_n + modifications_comptables_n;
        const total_cp_n = total_cp_avant_res_ex_n + resultats_exercice_n;

        $('#capitaux_total_des_capitaux_propres_avant_résultat_de_lexercice_n-1').val(formatNumber(total_cp_avant_res_ex_n_1));

        $('#capitaux_total_des_capitaux_propres_avant_résultat_de_lexercice_n').val(formatNumber(total_cp_avant_res_ex_n));

        $('#capitaux_total_des_capitaux_propres_après_résultat_de_lexercice_n-1').val(formatNumber(total_cp_n_1));

        $('#capitaux_total_des_capitaux_propres_après_résultat_de_lexercice_n').val(formatNumber(total_cp_n));
    })
}

function calcPNC(){
    $(PNC_IDS).on('blur', function(){
        const emprunts_n_1 = parseFloat(cleanNumber($('#passifs_emprunts_n-1').val())) || 0;
        const provisions_n_1 = parseFloat(cleanNumber($('#passifs_provisions_n-1').val())) || 0;
        const autres_passifs_fin_n_1 = parseFloat(cleanNumber($('#passifs_autres_passifs_financiers_n-1').val())) || 0;

        const emprunts_n = parseFloat(cleanNumber($('#passifs_emprunts_n').val())) || 0;
        const provisions_n = parseFloat(cleanNumber($('#passifs_provisions_n').val())) || 0;
        const autres_passifs_fin_n = parseFloat(cleanNumber($('#passifs_autres_passifs_financiers_n').val())) || 0;

        const total_PNC_n_1 = emprunts_n_1 + provisions_n_1 + autres_passifs_fin_n_1;

        const total_PNC_n = emprunts_n + provisions_n + autres_passifs_fin_n;

        $('#passifs_total_des_passifs_non_courants_n-1').val(formatNumber(total_PNC_n_1));

        $('#passifs_total_des_passifs_non_courants_n').val(formatNumber(total_PNC_n));
    })
}

function calcPC(){
    $(PC_IDS).on('blur', function(){
        const fournisseurs_n_1 = parseFloat(cleanNumber($('#passifs_fournisseurs_et_comptes_rattachés_n-1').val())) || 0;
        const autres_passifs_c_n_1 = parseFloat(cleanNumber($('#passifs_autres_passifs_courants_n-1').val())) || 0;
        const concours_n_1 = parseFloat(cleanNumber($('#passifs_concours_bancaires_et_autres_passifs_financiers_n-1').val())) || 0;

        const fournisseurs_n = parseFloat(cleanNumber($('#passifs_fournisseurs_et_comptes_rattachés_n').val())) || 0;
        const autres_passifs_c_n = parseFloat(cleanNumber($('#passifs_autres_passifs_courants_n').val())) || 0;
        const concours_n = parseFloat(cleanNumber($('#passifs_concours_bancaires_et_autres_passifs_financiers_n').val())) || 0;

        const total_PC_n_1 = fournisseurs_n_1 + autres_passifs_c_n_1 + concours_n_1;

        const total_PC_n = fournisseurs_n + autres_passifs_c_n + concours_n;

        $('#passifs_total_des_passifs_courants_n-1').val(formatNumber(total_PC_n_1));

        $('#passifs_total_des_passifs_courants_n').val(formatNumber(total_PC_n));
    })
}

function calcCPetP(){
    $(CP_IDS+','+PNC_IDS+','+PC_IDS).on('blur', function(){

        const total_cp_n_1 = parseFloat(cleanNumber($('#capitaux_total_des_capitaux_propres_après_résultat_de_lexercice_n-1').val())) || 0;
        const total_cp_n = parseFloat(cleanNumber($('#capitaux_total_des_capitaux_propres_après_résultat_de_lexercice_n').val())) || 0;

        const total_pnc_n_1 = parseFloat(cleanNumber($('#passifs_total_des_passifs_non_courants_n-1').val())) || 0;
        const total_pnc_n = parseFloat(cleanNumber($('#passifs_total_des_passifs_non_courants_n').val())) || 0;

        const total_pc_n_1 = parseFloat(cleanNumber($('#passifs_total_des_passifs_courants_n-1').val())) || 0;
        const total_pc_n = parseFloat(cleanNumber($('#passifs_total_des_passifs_courants_n').val())) || 0;
        
        const total_passifs_n_1 = total_pnc_n_1 + total_pc_n_1;
        const total_passifs_n = total_pnc_n + total_pc_n;

        const total_cp_p_n_1 = total_cp_n_1 + total_passifs_n_1;
        const total_cp_p_n = total_cp_n + total_passifs_n;



        $('#passifs_total_des_passifs_n-1').val(formatNumber(total_passifs_n_1));
        $('#passifs_total_des_passifs_n').val(formatNumber(total_passifs_n));

        $('#passifs_total_des_capitaux_propres_et_passifs_n-1').val(formatNumber(total_cp_p_n_1))
        $('#passifs_total_des_capitaux_propres_et_passifs_n').val(formatNumber(total_cp_p_n));
    })
}