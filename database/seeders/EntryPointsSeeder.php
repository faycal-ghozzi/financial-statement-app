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
            ['label' => 'Immobilisations incorporelles', 'category' => 'Actifs non courants', 'role' => 'Actif non courant'],
            ['label' => 'Amortissements - Immobilisations incorporelles', 'category' => 'Actifs non courants' , 'role' => 'Actif non courant - amortissement'],
            ['label' => 'Immobilisations corporelles', 'category' => 'Actifs non courants' , 'role' => 'Actif non courant'],
            ['label' => 'Amortissements - Immobilisations corporelles', 'category' => 'Actifs non courants' , 'role' => 'Actif non courant - amortissement'],
            ['label' => 'Immobilisations financières', 'category' => 'Actifs non courants' , 'role' => 'Actif non courant'],
            ['label' => 'Provisions - Immobilisations financières', 'category' => 'Actifs non courants' , 'role' => 'Actif non courant - provision'],
            ['label' => 'Total des actifs non courants', 'category' => 'Actifs non courants' , 'role' => 'Actif non courant - total'],
            // Actifs Courants
            ['label' => 'Stocks', 'category' => 'Actifs courants' , 'role' => 'Actif Courant'],
            ['label' => 'Provisions - Stocks', 'category' => 'Actifs courants' , 'role' => 'Actif Courant - provision'],
            ['label' => 'Clients et comptes rattachés', 'category' => 'Actifs courants' , 'role' => 'Actif Courant'],
            ['label' => 'Provisions - Clients et comptes rattachés', 'category' => 'Actifs courants' , 'role' => 'Actif Courant - provision'],
            ['label' => 'Autres actifs courants', 'category' => 'Actifs courants' , 'role' => 'Actif Courant'],
            ['label' => 'Placements et autres actifs financiers', 'category' => 'Actifs courants' , 'role' => 'Actif Courant'],
            ['label' => 'Liquidités et équivalents de liquidités', 'category' => 'Actifs courants' , 'role' => 'Actif Courant'],
            ['label' => 'Total des actifs courants', 'category' => 'Actifs courants' , 'role' => 'Actif Courant - total'],
            // Total Des Actifs
            ['label' => 'Total des actifs', 'category' => 'Actifs' , 'role' => 'Actifs - total'],
            
            // Capitaux Propres et passifs
            // Captaux Propres
            ['label' => 'Capital social', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres'],
            ['label' => 'Réserves légales', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres'], 
            ['label' => 'Autres capitaux propres', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres'], 
            ['label' => 'Réserves spéciales de réévaluation', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres'], 
            ['label' => 'Résultats reportés', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres'], 
            ['label' => 'Modifications comptables', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres'],
            ['label' => 'Total des capitaux propres avant résultat de l\'exercice', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres'], 
            ['label' => 'Résultat de l\'exercice', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres'], 
            ['label' => 'Total des capitaux propres après résultat de l\'exercice', 'category' => 'Capitaux propres' , 'role' => 'Capitaux propres - total'],
            // Passifs Non Courants
            ['label' => 'Emprunts', 'category' => 'Passifs non courants' , 'role' => 'Passif non courant'],
            ['label' => 'Provisions', 'category' => 'Passifs non courants' , 'role' => 'Passif non courant'],
            ['label' => 'Autres passifs financiers', 'category' => 'Passifs non courants' , 'role' => 'Passif non courant'],
            ['label' => 'Total des passifs non courants', 'category' => 'Passifs non courants' , 'role' => 'Passif non courant - total'],
            // Passifs Courants
            ['label' => 'Fournisseurs et comptes rattachés', 'category' => 'Passifs courants' , 'role' => 'Passif courant'],
            ['label' => 'Autres passifs courants', 'category' => 'Passifs courants' , 'role' => 'Passif courant'],
            ['label' => 'Concours bancaires et autres passifs financiers', 'category' => 'Passifs courants' , 'role' => 'Passif courant'],
            ['label' => 'Total des passifs courants', 'category' => 'Passifs courants' , 'role' => 'Passif courant - total'],
            // Total Des Passifs
            ['label' => 'Total des passifs', 'category' => 'Passifs' , 'role' => 'Passifs - total'],
            // Total Des Capitaux Propres et Passifs
            ['label' => 'Total des capitaux propres et passifs', 'category' => 'Capitaux Propres et Passifs' , 'role' => 'Capitaux propres et passifs'],

            // Etat de resultat
            // Produits d'exploitation
            ['label' => 'Revenus', 'category' => 'Résultat de l\'exercice', 'role' => 'Produits exploitation'],
            ['label' => 'Autres produits d\'exploitation', 'category' => 'Résultat de l\'exercice', 'role' => 'Produits exploitation'],
            ['label' => 'Production immobilisée', 'category' => 'Résultat de l\'exercice', 'role' => 'Produits exploitation'],
            ['label' => 'Total Produits d\'exploitation', 'category' => 'Résultat de l\'exercice', 'role' => 'Produits exploitation - total'],
            
            ['label' => 'Variation des stocks des produits finis et des encours', 'category' => 'Résultat de l\'exercice', 'role' => 'Charges exploitation'],
            ['label' => 'Achats de marchandises consommés', 'category' => 'Résultat de l\'exercice', 'role' => 'Charges exploitation'],
            ['label' => 'Achats d\'approvisionnements consommés', 'category' => 'Résultat de l\'exercice', 'role' => 'Charges exploitation'],
            ['label' => 'Charges de personnel', 'category' => 'Résultat de l\'exercice', 'role' => 'Charges exploitation'],
            ['label' => 'Dotations aux amortissements et aux provisions', 'category' => 'Résultat de l\'exercice', 'role' => 'Charges exploitation'],
            ['label' => 'Autres charges d\'exploitation', 'category' => 'Résultat de l\'exercice', 'role' => 'Charges exploitation'],
            ['label' => 'Total charges d\'exploitation', 'category' => 'Résultat de l\'exercice', 'role' => 'Charges exploitation - total'],

            ['label' => 'Résultat d\'exploitation ', 'category' => 'Résultat de l\'exercice', 'role' => 'Resultat exploitation - total'],

            ['label' => 'Charges financières nettes', 'category' => 'Résultat de l\'exercice', 'role' => 'Activites ordinaires'],
            ['label' => 'Produits des placements', 'category' => 'Résultat de l\'exercice', 'role' => 'Activites ordinaires'],
            ['label' => 'Autres gains ordinaires', 'category' => 'Résultat de l\'exercice', 'role' => 'Activites ordinaires - gains'],
            ['label' => 'Autres pertes ordinaires', 'category' => 'Résultat de l\'exercice', 'role' => 'Activites ordinaires'],
            ['label' => 'Résultat des activités ordinaires avant impôt', 'category' => 'Résultat de l\'exercice', 'role' => 'Activites ordinaires - total'],

            ['label' => 'Impôt sur les bénéfices', 'category' => 'Résultat de l\'exercice', 'role' => 'Impots'],

            ['label' => 'Résultat des activités ordinaires après impôt', 'category' => 'Résultat de l\'exercice', 'role' => 'Impots - total'],

            ['label' => 'Eléments extraordinaires (Gains)', 'category' => 'Résultat de l\'exercice', 'role' => 'Elements extraordinaires - gains'],
            ['label' => 'Eléments extraordinaires (Pertes)', 'category' => 'Résultat de l\'exercice', 'role' => 'Elements extraordinaires - pertes'],

            ['label' => 'Résultat net de l\'exercice', 'category' => 'Résultat de l\'exercice', 'role' => 'Resultat net'],

            ['label' => 'Effet des modifications comptables', 'category' => 'Résultat de l\'exercice', 'role' => 'Modifications comptables'],
            ['label' => 'Résultat après modifications comptables', 'category' => 'Résultat de l\'exercice', 'role' => 'Resultat exercice'],
        ];

        DB::table('fs_entry_points')->insert($entryPoints);
    }
}
