<?php
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
/**
 * Format phone number to standard US
 *
 * @param string $data 9161234567
 * @return string (916) 123-4567
 */
if ( ! function_exists('phone') ) {
    function phone($data)
    {
        if( preg_match( '/(\d{3})(\d{3})(\d{4})$/', $data,  $matches ) ) {
            $result = "({$matches[1]})" . ' ' .$matches[2] . '-' . $matches[3];
            return $result;
        }
    }
}
/**
 * Format decimal as US currency
 *
 * @param float $number 100.50
 * @param integer $decimal_places Number of decimal places to display (default: 2)
 * @return mixed Integer or Float depending on the $decimal_places param
 */
if ( ! function_exists('currency') ) {
    function currency( $number, $decimal_places = 2 )
    {
        if ( ! is_numeric($number) ) { return $number; }
        setlocale(LC_MONETARY, 'en_US');
        return money_format( '%.' . $decimal_places . 'n', $number );
    }
}
/**
 * Format date string as Carbon instance
 *
 * @param mixed $date Can be Carbon instance, DateTime instance, or date string
 * @param string $format Date string to format into. If null, will return Carbon instance
 * @return mixed Will return formatted date string If format is not null, otherwise will return Carbon instance
 */
if ( ! function_exists('carbon') ) {
    function carbon( $date, $format = null )
    {
        // check to see if $date is Carbon
        if ($date instanceof \Carbon\Carbon) {
            if ( $format != null ) {
                return $date->format( $format );
            } else {
                return $date;
            }
        }

        // check to see if $date is DateTime
        if ($date instanceof \DateTime) {
            if ( $format != null ) {
                return Carbon::parse( $date )->format( $format );
            } else {
                return Carbon::parse( $date );
            }
        }

        // if string and its a valid string return as Carbon
        if ( strtotime( $date ) && strtotime( $date ) != '1969-12-31') {
            if ( $format != null ) {
                return Carbon::parse( $date )->format( $format );
            } else {
                return Carbon::parse( $date );
            }
        }

        return null;
    }
}
/**
 * Simply echos selected on select fields
 *
 * @param string|integer $val1 The first value to compare
 * @param string|integer $val2 The second value to compare
 * @return void Will echo selected if equal, otherwise nothing
 */
if ( ! function_exists('selected') ) {
    function selected( $val1, $val2 )
    {
        if ( $val1 == $val2 )
        {
            echo 'selected="selected"';
        }
    }
}
/**
 * Simply echos checked on input fields
 *
 * @param string|integer $val1 The first value to compare
 * @param string|integer $val2 The second value to compare
 * @return void Will echo selected if equal, otherwise nothing
 */
if ( ! function_exists('checked') ) {
    function checked( $val1, $val2 )
    {
        if ( $val1 == $val2 )
        {
            echo 'checked="checked"';
        }
    }
}
/**
 * Adds column sorting to tables
 *
 * @param string $display The value you want to show the user
 * @param string $value The value you want to pass to the server
 * @return void Echos string
 */
if ( ! function_exists('sortable_link') ) {
    function sortable_link($display, $value)
    {
        $url = url()->current();
        $sort = request()->sort;
        $sort_order = request()->sort_order;
        $arrows = request()->sort == $value ? strtolower( request()->sort_order ) == 'desc' ? '<i class="fa fa-caret-up" style="vertical-align:top"></i>' : '<i class="fa fa-caret-down" style="vertical-align:top"></i>' : '';

        echo '<a style="color: white" href="' . $url . '?sort=' . $value . '&sort_order=' . ( $sort_order == 'desc' ? 'asc' : 'desc' ) . '&' . http_build_query ( request()->except(['page','sort','sort_order']) ) . '">' . $display . ' '  . $arrows . '</a>';
    }
}
/**
 * Simply a list of US states
 *
 * @return array Array of the US states
 */
if ( ! function_exists('states') ) {
    function states()
    {
        return [
            "AK" => "Alaska",
            "AL" => "Alabama",
            "AR" => "Arkansas",
            "AS" => "American Samoa",
            "AZ" => "Arizona",
            "CA" => "California",
            "CO" => "Colorado",
            "CT" => "Connecticut",
            "DC" => "District of Columbia",
            "DE" => "Delaware",
            "FL" => "Florida",
            "GA" => "Georgia",
            "GU" => "Guam",
            "HI" => "Hawaii",
            "IA" => "Iowa",
            "ID" => "Idaho",
            "IL" => "Illinois",
            "IN" => "Indiana",
            "KS" => "Kansas",
            "KY" => "Kentucky",
            "LA" => "Louisiana",
            "MA" => "Massachusetts",
            "MD" => "Maryland",
            "ME" => "Maine",
            "MI" => "Michigan",
            "MN" => "Minnesota",
            "MO" => "Missouri",
            "MS" => "Mississippi",
            "MT" => "Montana",
            "NC" => "North Carolina",
            "ND" => "North Dakota",
            "NE" => "Nebraska",
            "NH" => "New Hampshire",
            "NJ" => "New Jersey",
            "NM" => "New Mexico",
            "NV" => "Nevada",
            "NY" => "New York",
            "OH" => "Ohio",
            "OK" => "Oklahoma",
            "OR" => "Oregon",
            "PA" => "Pennsylvania",
            "PR" => "Puerto Rico",
            "RI" => "Rhode Island",
            "SC" => "South Carolina",
            "SD" => "South Dakota",
            "TN" => "Tennessee",
            "TX" => "Texas",
            "UT" => "Utah",
            "VA" => "Virginia",
            "VI" => "Virgin Islands",
            "VT" => "Vermont",
            "WA" => "Washington",
            "WI" => "Wisconsin",
            "WV" => "West Virginia",
            "WY" => "Wyoming"
        ];
    }
}
/**
 * Adds the git hash to the end of any asset tag
 * @param string $path The path to the asset you are trying to return
 */
if ( ! function_exists('versioned_asset') ) {
    function versioned_asset($path)
    {
        if ( Storage::exists('hash.txt') ) {
            return asset($path) . '?v=' . Storage::get('hash.txt');
        } else {
            return asset($path);
        }
    }
}
/**
 * Get suffix of a number
 *
 * @param int $number 50
 * @return string The number and suffix
 */
if ( ! function_exists('number_suffix') ) {
    function number_suffix($number) {
        if ( $number == null ) return;
        if ( ! is_numeric($number) ) return $number;
        $ends = array('th','st','nd','rd','th','th','th','th','th','th');
        $mod = $number % 100;
        // 11th, 12th, 13th
        if ( $mod >= 11 && $mod <= 13 ) {
            return $number . 'th';
        } else {
            return $number . $ends[$number % 10];
        }
    }
}
