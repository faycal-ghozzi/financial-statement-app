<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EntryPointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entryPoints = [
            //  Actifs
            //  Actifs Non Courants
            ['label' => 'Immobilisations incorporelles', 'category' => 'Actifs non courants', 'role' => 'Actifs Immobilises', 'decoration' => null],
            ['label' => 'Amortissements - Immobilisations incorporelles', 'category' => 'Actifs non courants' , 'role' => 'Actifs Immobilises - amortissement', 'decoration' => null],
            ['label' => 'Immobilisations corporelles', 'category' => 'Actifs non courants' , 'role' => 'Actifs Immobilises', 'decoration' => null],
            ['label' => 'Amortissements - Immobilisations corporelles', 'category' => 'Actifs non courants' , 'role' => 'Actifs Immobilises - amortissement', 'decoration' => null],
            ['label' => 'Immobilisations financières', 'category' => 'Actifs non courants' , 'role' => 'Actifs Immobilises', 'decoration' => null],
            ['label' => 'Provisions - Immobilisations financières', 'category' => 'Actifs non courants' , 'role' => 'Actifs Immobilises - provision', 'decoration' => null],
            ['label' => 'Total actifs immobilisés', 'category' => 'Actifs non courants' , 'role' => 'Actifs Immobilises - total', 'decoration' => 'bold'],
            ['label' => 'Autres actifs non courants', 'category' => 'Actifs non courants' , 'role' => 'Actif non courant', 'decoration' => 'bold'],
            ['label' => 'Total des actifs non courants', 'category' => 'Actifs non courants' , 'role' => 'Actif non courant - total', 'decoration' => 'stripe'],
            // Actifs Courants
            ['label' => 'Stocks', 'category' => 'Actifs courants' , 'role' => 'Actif Courant', 'decoration' => null],
            ['label' => 'Provisions - Stocks', 'category' => 'Actifs courants' , 'role' => 'Actif Courant - provision', 'decoration' => null],
            ['label' => 'Clients et comptes rattachés', 'category' => 'Actifs courants' , 'role' => 'Actif Courant', 'decoration' => null],
            ['label' => 'Provisions - Clients et comptes rattachés', 'category' => 'Actifs courants' , 'role' => 'Actif Courant - provision', 'decoration' => null],
            ['label' => 'Autres actifs courants', 'category' => 'Actifs courants' , 'role' => 'Actif Courant', 'decoration' => null],
            ['label' => 'Placements et autres actifs financiers', 'category' => 'Actifs courants' , 'role' => 'Actif Courant', 'decoration' => null],
            ['label' => 'Liquidités et équivalents de liquidités', 'category' => 'Actifs courants' , 'role' => 'Actif Courant', 'decoration' => null],
            ['label' => 'Total des actifs courants', 'category' => 'Actifs courants' , 'role' => 'Actif Courant - total', 'decoration' => 'stripe'],
            // Total Des Actifs
            ['label' => 'Total des actifs', 'category' => 'Actifs' , 'role' => 'Actifs - total', 'decoration' => 'stripe'],
            
            // Capitaux Propres et passifs
            // Captaux Propres
            ['label' => 'Capital social', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres', 'decoration' => null],
            ['label' => 'Réserves légales', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres', 'decoration' => null], 
            ['label' => 'Autres capitaux propres', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres', 'decoration' => null], 
            ['label' => 'Réserves spéciales de réévaluation', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres', 'decoration' => null], 
            ['label' => 'Résultats reportés', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres', 'decoration' => null], 
            ['label' => 'Modifications comptables', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres', 'decoration' => null],
            ['label' => 'Total des capitaux propres avant résultat de l\'exercice', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres', 'decoration' => 'bold'], 
            ['label' => 'Résultat de l\'exercice', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres', 'decoration' => null], 
            ['label' => 'Total des capitaux propres après résultat de l\'exercice', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres - total', 'decoration' => 'stripe'],
            // Passifs Non Courants
            ['label' => 'Emprunts', 'category' => 'Passifs non courants' , 'role' => 'Passif non courant', 'decoration' => null],
            ['label' => 'Provisions', 'category' => 'Passifs non courants' , 'role' => 'Passif non courant', 'decoration' => null],
            ['label' => 'Autres passifs financiers', 'category' => 'Passifs non courants' , 'role' => 'Passif non courant', 'decoration' => null],
            ['label' => 'Total des passifs non courants', 'category' => 'Passifs non courants' , 'role' => 'Passif non courant - total', 'decoration' => 'stripe'],
            // Passifs Courants
            ['label' => 'Fournisseurs et comptes rattachés', 'category' => 'Passifs courants' , 'role' => 'Passif courant', 'decoration' => null],
            ['label' => 'Autres passifs courants', 'category' => 'Passifs courants' , 'role' => 'Passif courant', 'decoration' => null],
            ['label' => 'Concours bancaires et autres passifs financiers', 'category' => 'Passifs courants' , 'role' => 'Passif courant', 'decoration' => null],
            ['label' => 'Total des passifs courants', 'category' => 'Passifs courants' , 'role' => 'Passif courant - total', 'decoration' => 'stripe'],
            // Total Des Passifs
            ['label' => 'Total des passifs', 'category' => 'Passifs' , 'role' => 'Passifs - total', 'decoration' => 'stripe'],
            // Total Des Capitaux Propres et Passifs
            ['label' => 'Total des capitaux propres et passifs', 'category' => 'Capitaux Propres et Passifs' , 'role' => 'Capitaux propres et passifs', 'decoration' => 'stripe'],

            // Etat de resultat
            // Produits d'exploitation
            ['label' => 'Revenus', 'category' => 'Résultat de l\'exercice', 'role' => 'Produits exploitation', 'decoration' => null],
            ['label' => 'Autres produits d\'exploitation', 'category' => 'Résultat de l\'exercice', 'role' => 'Produits exploitation', 'decoration' => null],
            ['label' => 'Production immobilisée', 'category' => 'Résultat de l\'exercice', 'role' => 'Produits exploitation', 'decoration' => null],
            ['label' => 'Total Produits d\'exploitation', 'category' => 'Résultat de l\'exercice', 'role' => 'Produits exploitation - total', 'decoration' => 'bold'],
            
            ['label' => 'Variation des stocks des produits finis et des encours', 'category' => 'Résultat de l\'exercice', 'role' => 'Charges exploitation', 'decoration' => null],
            ['label' => 'Achats de marchandises consommés', 'category' => 'Résultat de l\'exercice', 'role' => 'Charges exploitation', 'decoration' => null],
            ['label' => 'Achats d\'approvisionnements consommés', 'category' => 'Résultat de l\'exercice', 'role' => 'Charges exploitation', 'decoration' => null],
            ['label' => 'Charges de personnel', 'category' => 'Résultat de l\'exercice', 'role' => 'Charges exploitation', 'decoration' => null],
            ['label' => 'Dotations aux amortissements et aux provisions', 'category' => 'Résultat de l\'exercice', 'role' => 'Charges exploitation', 'decoration' => null],
            ['label' => 'Autres charges d\'exploitation', 'category' => 'Résultat de l\'exercice', 'role' => 'Charges exploitation', 'decoration' => null],
            ['label' => 'Total charges d\'exploitation', 'category' => 'Résultat de l\'exercice', 'role' => 'Charges exploitation - total', 'decoration' => 'bold'],

            ['label' => 'Résultat d\'exploitation ', 'category' => 'Résultat de l\'exercice', 'role' => 'Resultat exploitation - total', 'decoration' => 'stripe'],

            ['label' => 'Charges financières nettes', 'category' => 'Résultat de l\'exercice', 'role' => 'Activites ordinaires', 'decoration' => null],
            ['label' => 'Produits des placements', 'category' => 'Résultat de l\'exercice', 'role' => 'Activites ordinaires', 'decoration' => null],
            ['label' => 'Autres gains ordinaires', 'category' => 'Résultat de l\'exercice', 'role' => 'Activites ordinaires - gains', 'decoration' => null],
            ['label' => 'Autres pertes ordinaires', 'category' => 'Résultat de l\'exercice', 'role' => 'Activites ordinaires', 'decoration' => null],
            ['label' => 'Résultat des activités ordinaires avant impôt', 'category' => 'Résultat de l\'exercice', 'role' => 'Activites ordinaires - total', 'decoration' => 'stripe'],

            ['label' => 'Impôt sur les bénéfices', 'category' => 'Résultat de l\'exercice', 'role' => 'Impots', 'decoration' => null],
            ['label' => 'Résultat des activités ordinaires après impôt', 'category' => 'Résultat de l\'exercice', 'role' => 'Impots - total', 'decoration' => 'stripe'],

            ['label' => 'Eléments extraordinaires (Gains)', 'category' => 'Résultat de l\'exercice', 'role' => 'Elements extraordinaires - gains', 'decoration' => null],
            ['label' => 'Eléments extraordinaires (Pertes)', 'category' => 'Résultat de l\'exercice', 'role' => 'Elements extraordinaires - pertes', 'decoration' => null],

            ['label' => 'Résultat net de l\'exercice', 'category' => 'Résultat de l\'exercice', 'role' => 'Resultat net', 'decoration' => 'stripe'],
            ['label' => 'Effet des modifications comptables', 'category' => 'Résultat de l\'exercice', 'role' => 'Modifications comptables', 'decoration' => null],
            ['label' => 'Résultat après modifications comptables', 'category' => 'Résultat de l\'exercice', 'role' => 'Resultat exercice', 'decoration' => 'stripe'],
        ];

        DB::table('fs_entry_points')->insert($entryPoints);
    }
}
