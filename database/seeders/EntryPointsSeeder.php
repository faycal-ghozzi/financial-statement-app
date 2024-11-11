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
            ['label' => 'Immobilisations incorporelles', 'category' => 'Actifs non courants', 'rank' => 1],
            ['label' => 'Amortissements - Immobilisations incorporelles', 'category' => 'Actifs non courants' , 'rank' => 2],
            ['label' => 'Immobilisations corporelles', 'category' => 'Actifs non courants' , 'rank' => 3],
            ['label' => 'Amortissements - Immobilisations corporelles', 'category' => 'Actifs non courants' , 'rank' => 4],
            ['label' => 'Immobilisations financières', 'category' => 'Actifs non courants' , 'rank' => 5],
            ['label' => 'Provisions - Immobilisations financières', 'category' => 'Actifs non courants' , 'rank' => 6],
            ['label' => 'Total des actifs non courants', 'category' => 'Actifs non courants' , 'rank' => 7],
            // Actifs Courants
            ['label' => 'Stocks', 'category' => 'Actifs courants' , 'rank' => 1],
            ['label' => 'Provisions - Stocks', 'category' => 'Actifs courants' , 'rank' => 2],
            ['label' => 'Clients et comptes rattachés', 'category' => 'Actifs courants' , 'rank' => 3],
            ['label' => 'Provisions - Clients et comptes rattachés', 'category' => 'Actifs courants' , 'rank' => 4],
            ['label' => 'Autres actifs courants', 'category' => 'Actifs courants' , 'rank' => 5],
            ['label' => 'Placements et autres actifs financiers', 'category' => 'Actifs courants' , 'rank' => 6],
            ['label' => 'Liquidités et équivalents de liquidités', 'category' => 'Actifs courants' , 'rank' => 7],
            ['label' => 'Total des actifs courants', 'category' => 'Actifs courants' , 'rank' => 8],
            // Total Des Actifs
            ['label' => 'Total des actifs', 'category' => 'Actifs' , 'rank' => 1],
            
            // Capitaux Propres et passifs
            // Captaux Propres
            ['label' => 'Capital social', 'category' => 'Capitaux propres' , 'rank' => 1],
            ['label' => 'Réserves légales', 'category' => 'Capitaux propres' , 'rank' => 2], 
            ['label' => 'Autres capitaux propres', 'category' => 'Capitaux propres' , 'rank' => 3], 
            ['label' => 'Réserves spéciales de réévaluation', 'category' => 'Capitaux propres' , 'rank' => 4], 
            ['label' => 'Résultats reportés', 'category' => 'Capitaux propres' , 'rank' => 5], 
            ['label' => 'Modifications comptables', 'category' => 'Capitaux propres' , 'rank' => 6],
            ['label' => 'Total des capitaux propres avant résultat de l\'exercice', 'category' => 'Capitaux propres' , 'rank' => 7], 
            ['label' => 'Résultat de l\'exercice', 'category' => 'Capitaux propres' , 'rank' => 8], 
            ['label' => 'Total des capitaux propres après résultat de l\'exercice', 'category' => 'Capitaux propres' , 'rank' => 9],
            // Passifs Non Courants
            ['label' => 'Emprunts', 'category' => 'Passifs non courants' , 'rank' => 1],
            ['label' => 'Provisions', 'category' => 'Passifs non courants' , 'rank' => 2],
            ['label' => 'Autres passifs financiers', 'category' => 'Passifs non courants' , 'rank' => 3],
            ['label' => 'Total des passifs non courants', 'category' => 'Passifs non courants' , 'rank' => 4],
            // Passifs Courants
            ['label' => 'Fournisseurs et comptes rattachés', 'category' => 'Passifs courants' , 'rank' => 1],
            ['label' => 'Autres passifs courants', 'category' => 'Passifs courants' , 'rank' => 2],
            ['label' => 'Concours bancaires et autres passifs financiers', 'category' => 'Passifs courants' , 'rank' => 3],
            ['label' => 'Total des passifs courants', 'category' => 'Passifs courants' , 'rank' => 4],
            // Total Des Passifs
            ['label' => 'Total des passifs', 'category' => 'Passifs' , 'rank' => 1],
            // Total Des Capitaux Propres et Passifs
            ['label' => 'Total des capitaux propres et passifs', 'category' => 'Capitaux Propres et Passifs' , 'rank' => 1],

            // Etat de resultat
            // Produits d'exploitation
            ['label' => 'Revenus', 'category' => 'Résulat de l\'exercice', 'rank' => 1],
            ['label' => 'Autres produits d\'exploitation', 'category' => 'Résulat de l\'exercice', 'rank' => 2],
            ['label' => 'Production immobilisée', 'category' => 'Résulat de l\'exercice', 'rank' => 3],
            ['label' => 'Total Produits d\'exploitation', 'category' => 'Résulat de l\'exercice', 'rank' => 4],
            ['label' => 'Variation des stocks des produits finis et des encours', 'category' => 'Résulat de l\'exercice', 'rank' => 5],
            ['label' => 'Achats de marchandises consommés', 'category' => 'Résulat de l\'exercice', 'rank' => 6],
            ['label' => 'Achats d\'approvisionnements consommés', 'category' => 'Résulat de l\'exercice', 'rank' => 7],
            ['label' => 'Charges de personnel', 'category' => 'Résulat de l\'exercice', 'rank' => 8],
            ['label' => 'Dotations aux amortissements et aux provisions', 'category' => 'Résulat de l\'exercice', 'rank' => 9],
            ['label' => 'Autres charges d\'exploitation', 'category' => 'Résulat de l\'exercice', 'rank' => 10],
            ['label' => 'Total charges d\'exploitation', 'category' => 'Résulat de l\'exercice', 'rank' => 11],
            ['label' => 'Résultat d\'exploitation ', 'category' => 'Résulat de l\'exercice', 'rank' => 12],
            ['label' => 'Charges financières nettes', 'category' => 'Résulat de l\'exercice', 'rank' => 13],
            ['label' => 'Produits des placements', 'category' => 'Résulat de l\'exercice', 'rank' => 14],
            ['label' => 'Autres gains ordinaires', 'category' => 'Résulat de l\'exercice', 'rank' => 15],
            ['label' => 'Autres pertes ordinaires', 'category' => 'Résulat de l\'exercice', 'rank' => 16],
            ['label' => 'Autres pertes ordinaires', 'category' => 'Résulat de l\'exercice', 'rank' => 17],
            ['label' => 'Impôt sur les bénéfices', 'category' => 'Résulat de l\'exercice', 'rank' => 18],
            ['label' => 'Résultat des activités ordinaires après impôt', 'category' => 'Résulat de l\'exercice', 'rank' => 19],
            ['label' => 'Eléments extraordinaires (Gains/pertes)', 'category' => 'Résulat de l\'exercice', 'rank' => 20],
            ['label' => 'Résultat net de l\'exercice', 'category' => 'Résulat de l\'exercice', 'rank' => 21],
            ['label' => 'Effet des modifications comptables', 'category' => 'Résulat de l\'exercice', 'rank' => 22],
            ['label' => 'Résultat après modifications comptables', 'category' => 'Résulat de l\'exercice', 'rank' => 23],
        ];

        DB::table('fs_entry_points')->insert($entryPoints);
    }
}
