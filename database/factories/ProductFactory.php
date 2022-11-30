<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price = fake()->numberBetween(100, 5000);
        $brandId = fake()->numberBetween(1, 13);
        $categoryId = fake()->numberBetween(1, 8);
        $country = fake()->randomElement([
            'AF', 'AX', 'AL', 'DZ', 'AS', 'AD', 'AO', 'AI', 'AQ', 'AG', 'AR', 'AM', 'AW', 'AU', 'AT', 'AZ', 'BS', 'BH', 'BD', 'BB',
            'BY', 'BE', 'BZ', 'BJ', 'BM', 'BT', 'BO', 'BA', 'BW', 'BV', 'BR', 'VG', 'IO', 'BN', 'BG', 'BF', 'BI', 'KH', 'CM', 'CA',
            'CV', 'KY', 'CF', 'TD', 'CL', 'CN', 'HK', 'MO', 'CX', 'CC', 'CO', 'KM', 'CG', 'CD', 'CK', 'CR', 'CI', 'HR', 'CU', 'CY',
            'CZ', 'DK', 'DJ', 'DM', 'DO', 'EC', 'EG', 'SV', 'GQ', 'ER', 'EE', 'ET', 'FK', 'FO', 'FJ', 'FI', 'FR', 'GF', 'PF', 'TF',
            'GA', 'GM', 'GE', 'DE', 'GH', 'GI', 'GR', 'GL', 'GD', 'GP', 'GU', 'GT', 'GG', 'GN', 'GW', 'GY', 'HT', 'HM', 'VA', 'HN',
            'HU', 'IS', 'IN', 'ID', 'IR', 'IQ', 'IE', 'IM', 'IL', 'IT', 'JM', 'JP', 'JE', 'JO', 'KZ', 'KE', 'KI', 'KP', 'KR', 'KW',
            'KG', 'LA', 'LV', 'LB', 'LS', 'LR', 'LY', 'LI', 'LT', 'LU', 'MK', 'MG', 'MW', 'MY', 'MV', 'ML', 'MT', 'MH', 'MQ', 'MR',
            'MU', 'YT', 'MX', 'FM', 'MD', 'MC', 'MN', 'ME', 'MS', 'MA', 'MZ', 'MM', 'NA', 'NR', 'NP', 'NL', 'AN', 'NC', 'NZ', 'NI',
            'NE', 'NG', 'NU', 'NF', 'MP', 'NO', 'OM', 'PK', 'PW', 'PS', 'PA', 'PG', 'PY', 'PE', 'PH', 'PN', 'PL', 'PT', 'PR', 'QA',
            'RE', 'RO', 'RU', 'RW', 'BL', 'SH', 'KN', 'LC', 'MF', 'PM', 'VC', 'WS', 'SM', 'ST', 'SA', 'SN', 'RS', 'SC', 'SL', 'SG',
            'SK', 'SI', 'SB', 'SO', 'ZA', 'GS', 'SS', 'ES', 'LK', 'SD', 'SR', 'SJ', 'SZ', 'SE', 'CH', 'SY', 'TW', 'TJ', 'TZ', 'TH',
            'TL', 'TG', 'TK', 'TO', 'TT', 'TN', 'TR', 'TM', 'TC', 'TV', 'UG', 'UA', 'AE', 'GB', 'US', 'UM', 'UY', 'UZ', 'VU', 'VE',
            'VN', 'VI', 'WF', 'EH', 'YE', 'ZM', 'ZW'
        ]);
        switch ($categoryId) {
            case 1:
                $subCategoryId = fake()->numberBetween(1, 8);
                break;
            
            case 2:
                $subCategoryId = fake()->numberBetween(9, 25);
                break;
            
            case 3:
                $subCategoryId = fake()->numberBetween(26, 31);
                break;
            
            case 4:
                $subCategoryId = fake()->numberBetween(32, 36);
                break;
            
            case 5:
                $subCategoryId = fake()->numberBetween(37, 38);
                break;
            
            case 6:
                $subCategoryId = fake()->numberBetween(39, 40);
                break;
            
            case 7:
                $subCategoryId = fake()->numberBetween(41, 45);
                break;
            
            default:
                $subCategoryId = fake()->numberBetween(46, 48);
                break;
        }
        
        return [
            'brand_id' => $brandId,
            'category_id' => $categoryId,
            'sub_category_id' => $subCategoryId,
            'supplier_id' => fake()->numberBetween(1, 16),
            'department' => fake()->name(),
            'serial_number' => Str::random(10),
            'parts_number' => Str::random(10),
            'location' => fake()->city(),
            'rack_number' => fake()->randomElement(['A', 'B', 'C', 'D', 'E', 'F', 'G']),
            'image' => null,
            'purchase_order_number' => Str::random(10),
            'purchase_at' => fake()->dateTimeBetween('-3 month', '-2 month'),
            'expire_at' => fake()->dateTimeBetween('-2 month', '+1 month'),
            'purchase_price' => $price,
            'selling_price' => fake()->randomElement([null, fake()->numberBetween($price + 250, $price + 1680)]),
            'quantity' => fake()->numberBetween(0, 33),
            'country_origin' => $country,
        ];
    }
}
