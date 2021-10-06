<?php


namespace App\Helpers;


class Helper
{
    public static function category($categories, $category_id = '', $char = '')
    {
        $html = '';
        foreach ($categories as $key => $category) {
            if ($category->category_id== $category_id) {
                $html .= '
                    <tr>
                        <td>'. $category->id .'</td>
                        <td>'. $char . $category->name .'</td>
                        <td>'. $category->description .'</td>
                        <td>
                            <a href="/update_category/'. $category->id. '" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="" class="btn btn-danger btn-sm"
                            onclick="removeRow('. $category->id .', \'/delete_category\' )">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>>
                ';

                unset($categories[$key]);

                $html .= self::category($categories, $category->id, $char .'|--');
            }
        }

        return $html;
    }
}
