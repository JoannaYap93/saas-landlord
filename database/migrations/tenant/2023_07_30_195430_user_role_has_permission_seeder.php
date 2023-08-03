<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        \DB::table('tbl_user_role_has_permission')->insert(array (
            0 => 
            array (
                'permission_id' => 40,
                'role_id' => 13,
            ),
            1 => 
            array (
                'permission_id' => 41,
                'role_id' => 16,
            ),
            2 => 
            array (
                'permission_id' => 3,
                'role_id' => 16,
            ),
            3 => 
            array (
                'permission_id' => 41,
                'role_id' => 15,
            ),
            4 => 
            array (
                'permission_id' => 3,
                'role_id' => 15,
            ),
            5 => 
            array (
                'permission_id' => 1,
                'role_id' => 15,
            ),
            6 => 
            array (
                'permission_id' => 4,
                'role_id' => 15,
            ),
            7 => 
            array (
                'permission_id' => 6,
                'role_id' => 15,
            ),
            8 => 
            array (
                'permission_id' => 39,
                'role_id' => 15,
            ),
            9 => 
            array (
                'permission_id' => 8,
                'role_id' => 15,
            ),
            10 => 
            array (
                'permission_id' => 10,
                'role_id' => 15,
            ),
            11 => 
            array (
                'permission_id' => 12,
                'role_id' => 15,
            ),
            12 => 
            array (
                'permission_id' => 14,
                'role_id' => 15,
            ),
            13 => 
            array (
                'permission_id' => 16,
                'role_id' => 15,
            ),
            14 => 
            array (
                'permission_id' => 18,
                'role_id' => 15,
            ),
            15 => 
            array (
                'permission_id' => 20,
                'role_id' => 15,
            ),
            16 => 
            array (
                'permission_id' => 22,
                'role_id' => 15,
            ),
            17 => 
            array (
                'permission_id' => 24,
                'role_id' => 15,
            ),
            18 => 
            array (
                'permission_id' => 26,
                'role_id' => 15,
            ),
            19 => 
            array (
                'permission_id' => 30,
                'role_id' => 15,
            ),
            20 => 
            array (
                'permission_id' => 28,
                'role_id' => 15,
            ),
            21 => 
            array (
                'permission_id' => 37,
                'role_id' => 15,
            ),
            22 => 
            array (
                'permission_id' => 36,
                'role_id' => 15,
            ),
            23 => 
            array (
                'permission_id' => 41,
                'role_id' => 17,
            ),
            24 => 
            array (
                'permission_id' => 40,
                'role_id' => 17,
            ),
            25 => 
            array (
                'permission_id' => 2,
                'role_id' => 17,
            ),
            26 => 
            array (
                'permission_id' => 1,
                'role_id' => 17,
            ),
            27 => 
            array (
                'permission_id' => 44,
                'role_id' => 17,
            ),
            28 => 
            array (
                'permission_id' => 4,
                'role_id' => 17,
            ),
            29 => 
            array (
                'permission_id' => 5,
                'role_id' => 17,
            ),
            30 => 
            array (
                'permission_id' => 6,
                'role_id' => 17,
            ),
            31 => 
            array (
                'permission_id' => 7,
                'role_id' => 17,
            ),
            32 => 
            array (
                'permission_id' => 100,
                'role_id' => 17,
            ),
            33 => 
            array (
                'permission_id' => 99,
                'role_id' => 17,
            ),
            34 => 
            array (
                'permission_id' => 82,
                'role_id' => 17,
            ),
            35 => 
            array (
                'permission_id' => 81,
                'role_id' => 17,
            ),
            36 => 
            array (
                'permission_id' => 45,
                'role_id' => 17,
            ),
            37 => 
            array (
                'permission_id' => 39,
                'role_id' => 17,
            ),
            38 => 
            array (
                'permission_id' => 8,
                'role_id' => 17,
            ),
            39 => 
            array (
                'permission_id' => 9,
                'role_id' => 17,
            ),
            40 => 
            array (
                'permission_id' => 66,
                'role_id' => 17,
            ),
            41 => 
            array (
                'permission_id' => 65,
                'role_id' => 17,
            ),
            42 => 
            array (
                'permission_id' => 10,
                'role_id' => 17,
            ),
            43 => 
            array (
                'permission_id' => 11,
                'role_id' => 17,
            ),
            44 => 
            array (
                'permission_id' => 13,
                'role_id' => 17,
            ),
            45 => 
            array (
                'permission_id' => 12,
                'role_id' => 17,
            ),
            46 => 
            array (
                'permission_id' => 58,
                'role_id' => 17,
            ),
            47 => 
            array (
                'permission_id' => 57,
                'role_id' => 17,
            ),
            48 => 
            array (
                'permission_id' => 55,
                'role_id' => 17,
            ),
            49 => 
            array (
                'permission_id' => 56,
                'role_id' => 17,
            ),
            50 => 
            array (
                'permission_id' => 14,
                'role_id' => 17,
            ),
            51 => 
            array (
                'permission_id' => 15,
                'role_id' => 17,
            ),
            52 => 
            array (
                'permission_id' => 16,
                'role_id' => 17,
            ),
            53 => 
            array (
                'permission_id' => 17,
                'role_id' => 17,
            ),
            54 => 
            array (
                'permission_id' => 18,
                'role_id' => 17,
            ),
            55 => 
            array (
                'permission_id' => 19,
                'role_id' => 17,
            ),
            56 => 
            array (
                'permission_id' => 3,
                'role_id' => 17,
            ),
            57 => 
            array (
                'permission_id' => 46,
                'role_id' => 17,
            ),
            58 => 
            array (
                'permission_id' => 48,
                'role_id' => 17,
            ),
            59 => 
            array (
                'permission_id' => 21,
                'role_id' => 17,
            ),
            60 => 
            array (
                'permission_id' => 20,
                'role_id' => 17,
            ),
            61 => 
            array (
                'permission_id' => 59,
                'role_id' => 17,
            ),
            62 => 
            array (
                'permission_id' => 60,
                'role_id' => 17,
            ),
            63 => 
            array (
                'permission_id' => 61,
                'role_id' => 17,
            ),
            64 => 
            array (
                'permission_id' => 62,
                'role_id' => 17,
            ),
            65 => 
            array (
                'permission_id' => 64,
                'role_id' => 17,
            ),
            66 => 
            array (
                'permission_id' => 63,
                'role_id' => 17,
            ),
            67 => 
            array (
                'permission_id' => 47,
                'role_id' => 17,
            ),
            68 => 
            array (
                'permission_id' => 23,
                'role_id' => 17,
            ),
            69 => 
            array (
                'permission_id' => 22,
                'role_id' => 17,
            ),
            70 => 
            array (
                'permission_id' => 32,
                'role_id' => 17,
            ),
            71 => 
            array (
                'permission_id' => 73,
                'role_id' => 17,
            ),
            72 => 
            array (
                'permission_id' => 74,
                'role_id' => 17,
            ),
            73 => 
            array (
                'permission_id' => 77,
                'role_id' => 17,
            ),
            74 => 
            array (
                'permission_id' => 78,
                'role_id' => 17,
            ),
            75 => 
            array (
                'permission_id' => 24,
                'role_id' => 17,
            ),
            76 => 
            array (
                'permission_id' => 25,
                'role_id' => 17,
            ),
            77 => 
            array (
                'permission_id' => 26,
                'role_id' => 17,
            ),
            78 => 
            array (
                'permission_id' => 27,
                'role_id' => 17,
            ),
            79 => 
            array (
                'permission_id' => 31,
                'role_id' => 17,
            ),
            80 => 
            array (
                'permission_id' => 30,
                'role_id' => 17,
            ),
            81 => 
            array (
                'permission_id' => 29,
                'role_id' => 17,
            ),
            82 => 
            array (
                'permission_id' => 28,
                'role_id' => 17,
            ),
            83 => 
            array (
                'permission_id' => 49,
                'role_id' => 17,
            ),
            84 => 
            array (
                'permission_id' => 50,
                'role_id' => 17,
            ),
            85 => 
            array (
                'permission_id' => 51,
                'role_id' => 17,
            ),
            86 => 
            array (
                'permission_id' => 52,
                'role_id' => 17,
            ),
            87 => 
            array (
                'permission_id' => 75,
                'role_id' => 17,
            ),
            88 => 
            array (
                'permission_id' => 76,
                'role_id' => 17,
            ),
            89 => 
            array (
                'permission_id' => 53,
                'role_id' => 17,
            ),
            90 => 
            array (
                'permission_id' => 54,
                'role_id' => 17,
            ),
            91 => 
            array (
                'permission_id' => 37,
                'role_id' => 17,
            ),
            92 => 
            array (
                'permission_id' => 34,
                'role_id' => 17,
            ),
            93 => 
            array (
                'permission_id' => 42,
                'role_id' => 17,
            ),
            94 => 
            array (
                'permission_id' => 38,
                'role_id' => 17,
            ),
            95 => 
            array (
                'permission_id' => 35,
                'role_id' => 17,
            ),
            96 => 
            array (
                'permission_id' => 33,
                'role_id' => 17,
            ),
            97 => 
            array (
                'permission_id' => 87,
                'role_id' => 17,
            ),
            98 => 
            array (
                'permission_id' => 88,
                'role_id' => 17,
            ),
            99 => 
            array (
                'permission_id' => 83,
                'role_id' => 17,
            ),
            100 => 
            array (
                'permission_id' => 84,
                'role_id' => 17,
            ),
            101 => 
            array (
                'permission_id' => 85,
                'role_id' => 17,
            ),
            102 => 
            array (
                'permission_id' => 86,
                'role_id' => 17,
            ),
            103 => 
            array (
                'permission_id' => 43,
                'role_id' => 17,
            ),
            104 => 
            array (
                'permission_id' => 36,
                'role_id' => 17,
            ),
            105 => 
            array (
                'permission_id' => 98,
                'role_id' => 17,
            ),
            106 => 
            array (
                'permission_id' => 71,
                'role_id' => 17,
            ),
            107 => 
            array (
                'permission_id' => 72,
                'role_id' => 17,
            ),
            108 => 
            array (
                'permission_id' => 80,
                'role_id' => 17,
            ),
            109 => 
            array (
                'permission_id' => 79,
                'role_id' => 17,
            ),
            110 => 
            array (
                'permission_id' => 68,
                'role_id' => 17,
            ),
            111 => 
            array (
                'permission_id' => 67,
                'role_id' => 17,
            ),
            112 => 
            array (
                'permission_id' => 69,
                'role_id' => 17,
            ),
            113 => 
            array (
                'permission_id' => 70,
                'role_id' => 17,
            ),
            114 => 
            array (
                'permission_id' => 41,
                'role_id' => 14,
            ),
            115 => 
            array (
                'permission_id' => 39,
                'role_id' => 14,
            ),
            116 => 
            array (
                'permission_id' => 20,
                'role_id' => 14,
            ),
            117 => 
            array (
                'permission_id' => 22,
                'role_id' => 14,
            ),
            118 => 
            array (
                'permission_id' => 37,
                'role_id' => 14,
            ),
            119 => 
            array (
                'permission_id' => 41,
                'role_id' => 1,
            ),
            120 => 
            array (
                'permission_id' => 2,
                'role_id' => 1,
            ),
            121 => 
            array (
                'permission_id' => 1,
                'role_id' => 1,
            ),
            122 => 
            array (
                'permission_id' => 4,
                'role_id' => 1,
            ),
            123 => 
            array (
                'permission_id' => 5,
                'role_id' => 1,
            ),
            124 => 
            array (
                'permission_id' => 6,
                'role_id' => 1,
            ),
            125 => 
            array (
                'permission_id' => 7,
                'role_id' => 1,
            ),
            126 => 
            array (
                'permission_id' => 99,
                'role_id' => 1,
            ),
            127 => 
            array (
                'permission_id' => 100,
                'role_id' => 1,
            ),
            128 => 
            array (
                'permission_id' => 81,
                'role_id' => 1,
            ),
            129 => 
            array (
                'permission_id' => 39,
                'role_id' => 1,
            ),
            130 => 
            array (
                'permission_id' => 9,
                'role_id' => 1,
            ),
            131 => 
            array (
                'permission_id' => 8,
                'role_id' => 1,
            ),
            132 => 
            array (
                'permission_id' => 65,
                'role_id' => 1,
            ),
            133 => 
            array (
                'permission_id' => 66,
                'role_id' => 1,
            ),
            134 => 
            array (
                'permission_id' => 10,
                'role_id' => 1,
            ),
            135 => 
            array (
                'permission_id' => 13,
                'role_id' => 1,
            ),
            136 => 
            array (
                'permission_id' => 12,
                'role_id' => 1,
            ),
            137 => 
            array (
                'permission_id' => 57,
                'role_id' => 1,
            ),
            138 => 
            array (
                'permission_id' => 58,
                'role_id' => 1,
            ),
            139 => 
            array (
                'permission_id' => 55,
                'role_id' => 1,
            ),
            140 => 
            array (
                'permission_id' => 56,
                'role_id' => 1,
            ),
            141 => 
            array (
                'permission_id' => 15,
                'role_id' => 1,
            ),
            142 => 
            array (
                'permission_id' => 14,
                'role_id' => 1,
            ),
            143 => 
            array (
                'permission_id' => 17,
                'role_id' => 1,
            ),
            144 => 
            array (
                'permission_id' => 16,
                'role_id' => 1,
            ),
            145 => 
            array (
                'permission_id' => 19,
                'role_id' => 1,
            ),
            146 => 
            array (
                'permission_id' => 18,
                'role_id' => 1,
            ),
            147 => 
            array (
                'permission_id' => 3,
                'role_id' => 1,
            ),
            148 => 
            array (
                'permission_id' => 21,
                'role_id' => 1,
            ),
            149 => 
            array (
                'permission_id' => 20,
                'role_id' => 1,
            ),
            150 => 
            array (
                'permission_id' => 59,
                'role_id' => 1,
            ),
            151 => 
            array (
                'permission_id' => 60,
                'role_id' => 1,
            ),
            152 => 
            array (
                'permission_id' => 61,
                'role_id' => 1,
            ),
            153 => 
            array (
                'permission_id' => 63,
                'role_id' => 1,
            ),
            154 => 
            array (
                'permission_id' => 64,
                'role_id' => 1,
            ),
            155 => 
            array (
                'permission_id' => 47,
                'role_id' => 1,
            ),
            156 => 
            array (
                'permission_id' => 101,
                'role_id' => 1,
            ),
            157 => 
            array (
                'permission_id' => 22,
                'role_id' => 1,
            ),
            158 => 
            array (
                'permission_id' => 23,
                'role_id' => 1,
            ),
            159 => 
            array (
                'permission_id' => 32,
                'role_id' => 1,
            ),
            160 => 
            array (
                'permission_id' => 24,
                'role_id' => 1,
            ),
            161 => 
            array (
                'permission_id' => 25,
                'role_id' => 1,
            ),
            162 => 
            array (
                'permission_id' => 26,
                'role_id' => 1,
            ),
            163 => 
            array (
                'permission_id' => 27,
                'role_id' => 1,
            ),
            164 => 
            array (
                'permission_id' => 31,
                'role_id' => 1,
            ),
            165 => 
            array (
                'permission_id' => 30,
                'role_id' => 1,
            ),
            166 => 
            array (
                'permission_id' => 29,
                'role_id' => 1,
            ),
            167 => 
            array (
                'permission_id' => 28,
                'role_id' => 1,
            ),
            168 => 
            array (
                'permission_id' => 49,
                'role_id' => 1,
            ),
            169 => 
            array (
                'permission_id' => 51,
                'role_id' => 1,
            ),
            170 => 
            array (
                'permission_id' => 76,
                'role_id' => 1,
            ),
            171 => 
            array (
                'permission_id' => 75,
                'role_id' => 1,
            ),
            172 => 
            array (
                'permission_id' => 53,
                'role_id' => 1,
            ),
            173 => 
            array (
                'permission_id' => 54,
                'role_id' => 1,
            ),
            174 => 
            array (
                'permission_id' => 37,
                'role_id' => 1,
            ),
            175 => 
            array (
                'permission_id' => 38,
                'role_id' => 1,
            ),
            176 => 
            array (
                'permission_id' => 35,
                'role_id' => 1,
            ),
            177 => 
            array (
                'permission_id' => 34,
                'role_id' => 1,
            ),
            178 => 
            array (
                'permission_id' => 33,
                'role_id' => 1,
            ),
            179 => 
            array (
                'permission_id' => 87,
                'role_id' => 1,
            ),
            180 => 
            array (
                'permission_id' => 83,
                'role_id' => 1,
            ),
            181 => 
            array (
                'permission_id' => 84,
                'role_id' => 1,
            ),
            182 => 
            array (
                'permission_id' => 86,
                'role_id' => 1,
            ),
            183 => 
            array (
                'permission_id' => 85,
                'role_id' => 1,
            ),
            184 => 
            array (
                'permission_id' => 36,
                'role_id' => 1,
            ),
            185 => 
            array (
                'permission_id' => 71,
                'role_id' => 1,
            ),
            186 => 
            array (
                'permission_id' => 72,
                'role_id' => 1,
            ),
            187 => 
            array (
                'permission_id' => 80,
                'role_id' => 1,
            ),
            188 => 
            array (
                'permission_id' => 79,
                'role_id' => 1,
            ),
            189 => 
            array (
                'permission_id' => 67,
                'role_id' => 1,
            ),
            190 => 
            array (
                'permission_id' => 68,
                'role_id' => 1,
            ),
            191 => 
            array (
                'permission_id' => 69,
                'role_id' => 1,
            ),
            192 => 
            array (
                'permission_id' => 41,
                'role_id' => 18,
            ),
            193 => 
            array (
                'permission_id' => 40,
                'role_id' => 18,
            ),
            194 => 
            array (
                'permission_id' => 2,
                'role_id' => 18,
            ),
            195 => 
            array (
                'permission_id' => 44,
                'role_id' => 18,
            ),
            196 => 
            array (
                'permission_id' => 1,
                'role_id' => 18,
            ),
            197 => 
            array (
                'permission_id' => 4,
                'role_id' => 18,
            ),
            198 => 
            array (
                'permission_id' => 5,
                'role_id' => 18,
            ),
            199 => 
            array (
                'permission_id' => 6,
                'role_id' => 18,
            ),
            200 => 
            array (
                'permission_id' => 7,
                'role_id' => 18,
            ),
            201 => 
            array (
                'permission_id' => 99,
                'role_id' => 18,
            ),
            202 => 
            array (
                'permission_id' => 100,
                'role_id' => 18,
            ),
            203 => 
            array (
                'permission_id' => 81,
                'role_id' => 18,
            ),
            204 => 
            array (
                'permission_id' => 82,
                'role_id' => 18,
            ),
            205 => 
            array (
                'permission_id' => 39,
                'role_id' => 18,
            ),
            206 => 
            array (
                'permission_id' => 45,
                'role_id' => 18,
            ),
            207 => 
            array (
                'permission_id' => 9,
                'role_id' => 18,
            ),
            208 => 
            array (
                'permission_id' => 8,
                'role_id' => 18,
            ),
            209 => 
            array (
                'permission_id' => 65,
                'role_id' => 18,
            ),
            210 => 
            array (
                'permission_id' => 66,
                'role_id' => 18,
            ),
            211 => 
            array (
                'permission_id' => 11,
                'role_id' => 18,
            ),
            212 => 
            array (
                'permission_id' => 10,
                'role_id' => 18,
            ),
            213 => 
            array (
                'permission_id' => 13,
                'role_id' => 18,
            ),
            214 => 
            array (
                'permission_id' => 12,
                'role_id' => 18,
            ),
            215 => 
            array (
                'permission_id' => 57,
                'role_id' => 18,
            ),
            216 => 
            array (
                'permission_id' => 58,
                'role_id' => 18,
            ),
            217 => 
            array (
                'permission_id' => 55,
                'role_id' => 18,
            ),
            218 => 
            array (
                'permission_id' => 56,
                'role_id' => 18,
            ),
            219 => 
            array (
                'permission_id' => 15,
                'role_id' => 18,
            ),
            220 => 
            array (
                'permission_id' => 14,
                'role_id' => 18,
            ),
            221 => 
            array (
                'permission_id' => 17,
                'role_id' => 18,
            ),
            222 => 
            array (
                'permission_id' => 16,
                'role_id' => 18,
            ),
            223 => 
            array (
                'permission_id' => 19,
                'role_id' => 18,
            ),
            224 => 
            array (
                'permission_id' => 18,
                'role_id' => 18,
            ),
            225 => 
            array (
                'permission_id' => 3,
                'role_id' => 18,
            ),
            226 => 
            array (
                'permission_id' => 48,
                'role_id' => 18,
            ),
            227 => 
            array (
                'permission_id' => 46,
                'role_id' => 18,
            ),
            228 => 
            array (
                'permission_id' => 21,
                'role_id' => 18,
            ),
            229 => 
            array (
                'permission_id' => 20,
                'role_id' => 18,
            ),
            230 => 
            array (
                'permission_id' => 59,
                'role_id' => 18,
            ),
            231 => 
            array (
                'permission_id' => 60,
                'role_id' => 18,
            ),
            232 => 
            array (
                'permission_id' => 61,
                'role_id' => 18,
            ),
            233 => 
            array (
                'permission_id' => 62,
                'role_id' => 18,
            ),
            234 => 
            array (
                'permission_id' => 63,
                'role_id' => 18,
            ),
            235 => 
            array (
                'permission_id' => 64,
                'role_id' => 18,
            ),
            236 => 
            array (
                'permission_id' => 47,
                'role_id' => 18,
            ),
            237 => 
            array (
                'permission_id' => 101,
                'role_id' => 18,
            ),
            238 => 
            array (
                'permission_id' => 22,
                'role_id' => 18,
            ),
            239 => 
            array (
                'permission_id' => 23,
                'role_id' => 18,
            ),
            240 => 
            array (
                'permission_id' => 32,
                'role_id' => 18,
            ),
            241 => 
            array (
                'permission_id' => 73,
                'role_id' => 18,
            ),
            242 => 
            array (
                'permission_id' => 74,
                'role_id' => 18,
            ),
            243 => 
            array (
                'permission_id' => 96,
                'role_id' => 18,
            ),
            244 => 
            array (
                'permission_id' => 95,
                'role_id' => 18,
            ),
            245 => 
            array (
                'permission_id' => 94,
                'role_id' => 18,
            ),
            246 => 
            array (
                'permission_id' => 93,
                'role_id' => 18,
            ),
            247 => 
            array (
                'permission_id' => 77,
                'role_id' => 18,
            ),
            248 => 
            array (
                'permission_id' => 78,
                'role_id' => 18,
            ),
            249 => 
            array (
                'permission_id' => 24,
                'role_id' => 18,
            ),
            250 => 
            array (
                'permission_id' => 25,
                'role_id' => 18,
            ),
            251 => 
            array (
                'permission_id' => 26,
                'role_id' => 18,
            ),
            252 => 
            array (
                'permission_id' => 27,
                'role_id' => 18,
            ),
            253 => 
            array (
                'permission_id' => 31,
                'role_id' => 18,
            ),
            254 => 
            array (
                'permission_id' => 30,
                'role_id' => 18,
            ),
            255 => 
            array (
                'permission_id' => 29,
                'role_id' => 18,
            ),
            256 => 
            array (
                'permission_id' => 28,
                'role_id' => 18,
            ),
            257 => 
            array (
                'permission_id' => 50,
                'role_id' => 18,
            ),
            258 => 
            array (
                'permission_id' => 49,
                'role_id' => 18,
            ),
            259 => 
            array (
                'permission_id' => 51,
                'role_id' => 18,
            ),
            260 => 
            array (
                'permission_id' => 52,
                'role_id' => 18,
            ),
            261 => 
            array (
                'permission_id' => 76,
                'role_id' => 18,
            ),
            262 => 
            array (
                'permission_id' => 75,
                'role_id' => 18,
            ),
            263 => 
            array (
                'permission_id' => 53,
                'role_id' => 18,
            ),
            264 => 
            array (
                'permission_id' => 54,
                'role_id' => 18,
            ),
            265 => 
            array (
                'permission_id' => 37,
                'role_id' => 18,
            ),
            266 => 
            array (
                'permission_id' => 42,
                'role_id' => 18,
            ),
            267 => 
            array (
                'permission_id' => 38,
                'role_id' => 18,
            ),
            268 => 
            array (
                'permission_id' => 35,
                'role_id' => 18,
            ),
            269 => 
            array (
                'permission_id' => 34,
                'role_id' => 18,
            ),
            270 => 
            array (
                'permission_id' => 92,
                'role_id' => 18,
            ),
            271 => 
            array (
                'permission_id' => 33,
                'role_id' => 18,
            ),
            272 => 
            array (
                'permission_id' => 88,
                'role_id' => 18,
            ),
            273 => 
            array (
                'permission_id' => 87,
                'role_id' => 18,
            ),
            274 => 
            array (
                'permission_id' => 83,
                'role_id' => 18,
            ),
            275 => 
            array (
                'permission_id' => 84,
                'role_id' => 18,
            ),
            276 => 
            array (
                'permission_id' => 86,
                'role_id' => 18,
            ),
            277 => 
            array (
                'permission_id' => 97,
                'role_id' => 18,
            ),
            278 => 
            array (
                'permission_id' => 85,
                'role_id' => 18,
            ),
            279 => 
            array (
                'permission_id' => 43,
                'role_id' => 18,
            ),
            280 => 
            array (
                'permission_id' => 36,
                'role_id' => 18,
            ),
            281 => 
            array (
                'permission_id' => 98,
                'role_id' => 18,
            ),
            282 => 
            array (
                'permission_id' => 71,
                'role_id' => 18,
            ),
            283 => 
            array (
                'permission_id' => 72,
                'role_id' => 18,
            ),
            284 => 
            array (
                'permission_id' => 80,
                'role_id' => 18,
            ),
            285 => 
            array (
                'permission_id' => 79,
                'role_id' => 18,
            ),
            286 => 
            array (
                'permission_id' => 67,
                'role_id' => 18,
            ),
            287 => 
            array (
                'permission_id' => 68,
                'role_id' => 18,
            ),
            288 => 
            array (
                'permission_id' => 69,
                'role_id' => 18,
            ),
            289 => 
            array (
                'permission_id' => 70,
                'role_id' => 18,
            ),
            290 => 
            array (
                'permission_id' => 41,
                'role_id' => 19,
            ),
            291 => 
            array (
                'permission_id' => 40,
                'role_id' => 19,
            ),
            292 => 
            array (
                'permission_id' => 2,
                'role_id' => 19,
            ),
            293 => 
            array (
                'permission_id' => 44,
                'role_id' => 19,
            ),
            294 => 
            array (
                'permission_id' => 1,
                'role_id' => 19,
            ),
            295 => 
            array (
                'permission_id' => 4,
                'role_id' => 19,
            ),
            296 => 
            array (
                'permission_id' => 5,
                'role_id' => 19,
            ),
            297 => 
            array (
                'permission_id' => 6,
                'role_id' => 19,
            ),
            298 => 
            array (
                'permission_id' => 7,
                'role_id' => 19,
            ),
            299 => 
            array (
                'permission_id' => 99,
                'role_id' => 19,
            ),
            300 => 
            array (
                'permission_id' => 100,
                'role_id' => 19,
            ),
            301 => 
            array (
                'permission_id' => 81,
                'role_id' => 19,
            ),
            302 => 
            array (
                'permission_id' => 82,
                'role_id' => 19,
            ),
            303 => 
            array (
                'permission_id' => 39,
                'role_id' => 19,
            ),
            304 => 
            array (
                'permission_id' => 45,
                'role_id' => 19,
            ),
            305 => 
            array (
                'permission_id' => 9,
                'role_id' => 19,
            ),
            306 => 
            array (
                'permission_id' => 8,
                'role_id' => 19,
            ),
            307 => 
            array (
                'permission_id' => 65,
                'role_id' => 19,
            ),
            308 => 
            array (
                'permission_id' => 66,
                'role_id' => 19,
            ),
            309 => 
            array (
                'permission_id' => 11,
                'role_id' => 19,
            ),
            310 => 
            array (
                'permission_id' => 10,
                'role_id' => 19,
            ),
            311 => 
            array (
                'permission_id' => 13,
                'role_id' => 19,
            ),
            312 => 
            array (
                'permission_id' => 12,
                'role_id' => 19,
            ),
            313 => 
            array (
                'permission_id' => 57,
                'role_id' => 19,
            ),
            314 => 
            array (
                'permission_id' => 58,
                'role_id' => 19,
            ),
            315 => 
            array (
                'permission_id' => 55,
                'role_id' => 19,
            ),
            316 => 
            array (
                'permission_id' => 56,
                'role_id' => 19,
            ),
            317 => 
            array (
                'permission_id' => 15,
                'role_id' => 19,
            ),
            318 => 
            array (
                'permission_id' => 14,
                'role_id' => 19,
            ),
            319 => 
            array (
                'permission_id' => 17,
                'role_id' => 19,
            ),
            320 => 
            array (
                'permission_id' => 16,
                'role_id' => 19,
            ),
            321 => 
            array (
                'permission_id' => 19,
                'role_id' => 19,
            ),
            322 => 
            array (
                'permission_id' => 18,
                'role_id' => 19,
            ),
            323 => 
            array (
                'permission_id' => 3,
                'role_id' => 19,
            ),
            324 => 
            array (
                'permission_id' => 48,
                'role_id' => 19,
            ),
            325 => 
            array (
                'permission_id' => 46,
                'role_id' => 19,
            ),
            326 => 
            array (
                'permission_id' => 21,
                'role_id' => 19,
            ),
            327 => 
            array (
                'permission_id' => 20,
                'role_id' => 19,
            ),
            328 => 
            array (
                'permission_id' => 59,
                'role_id' => 19,
            ),
            329 => 
            array (
                'permission_id' => 60,
                'role_id' => 19,
            ),
            330 => 
            array (
                'permission_id' => 61,
                'role_id' => 19,
            ),
            331 => 
            array (
                'permission_id' => 62,
                'role_id' => 19,
            ),
            332 => 
            array (
                'permission_id' => 63,
                'role_id' => 19,
            ),
            333 => 
            array (
                'permission_id' => 64,
                'role_id' => 19,
            ),
            334 => 
            array (
                'permission_id' => 47,
                'role_id' => 19,
            ),
            335 => 
            array (
                'permission_id' => 101,
                'role_id' => 19,
            ),
            336 => 
            array (
                'permission_id' => 22,
                'role_id' => 19,
            ),
            337 => 
            array (
                'permission_id' => 23,
                'role_id' => 19,
            ),
            338 => 
            array (
                'permission_id' => 32,
                'role_id' => 19,
            ),
            339 => 
            array (
                'permission_id' => 73,
                'role_id' => 19,
            ),
            340 => 
            array (
                'permission_id' => 74,
                'role_id' => 19,
            ),
            341 => 
            array (
                'permission_id' => 96,
                'role_id' => 19,
            ),
            342 => 
            array (
                'permission_id' => 95,
                'role_id' => 19,
            ),
            343 => 
            array (
                'permission_id' => 94,
                'role_id' => 19,
            ),
            344 => 
            array (
                'permission_id' => 93,
                'role_id' => 19,
            ),
            345 => 
            array (
                'permission_id' => 77,
                'role_id' => 19,
            ),
            346 => 
            array (
                'permission_id' => 78,
                'role_id' => 19,
            ),
            347 => 
            array (
                'permission_id' => 24,
                'role_id' => 19,
            ),
            348 => 
            array (
                'permission_id' => 25,
                'role_id' => 19,
            ),
            349 => 
            array (
                'permission_id' => 26,
                'role_id' => 19,
            ),
            350 => 
            array (
                'permission_id' => 27,
                'role_id' => 19,
            ),
            351 => 
            array (
                'permission_id' => 31,
                'role_id' => 19,
            ),
            352 => 
            array (
                'permission_id' => 30,
                'role_id' => 19,
            ),
            353 => 
            array (
                'permission_id' => 29,
                'role_id' => 19,
            ),
            354 => 
            array (
                'permission_id' => 28,
                'role_id' => 19,
            ),
            355 => 
            array (
                'permission_id' => 50,
                'role_id' => 19,
            ),
            356 => 
            array (
                'permission_id' => 49,
                'role_id' => 19,
            ),
            357 => 
            array (
                'permission_id' => 51,
                'role_id' => 19,
            ),
            358 => 
            array (
                'permission_id' => 52,
                'role_id' => 19,
            ),
            359 => 
            array (
                'permission_id' => 76,
                'role_id' => 19,
            ),
            360 => 
            array (
                'permission_id' => 75,
                'role_id' => 19,
            ),
            361 => 
            array (
                'permission_id' => 53,
                'role_id' => 19,
            ),
            362 => 
            array (
                'permission_id' => 54,
                'role_id' => 19,
            ),
            363 => 
            array (
                'permission_id' => 37,
                'role_id' => 19,
            ),
            364 => 
            array (
                'permission_id' => 42,
                'role_id' => 19,
            ),
            365 => 
            array (
                'permission_id' => 38,
                'role_id' => 19,
            ),
            366 => 
            array (
                'permission_id' => 35,
                'role_id' => 19,
            ),
            367 => 
            array (
                'permission_id' => 34,
                'role_id' => 19,
            ),
            368 => 
            array (
                'permission_id' => 92,
                'role_id' => 19,
            ),
            369 => 
            array (
                'permission_id' => 33,
                'role_id' => 19,
            ),
            370 => 
            array (
                'permission_id' => 88,
                'role_id' => 19,
            ),
            371 => 
            array (
                'permission_id' => 87,
                'role_id' => 19,
            ),
            372 => 
            array (
                'permission_id' => 83,
                'role_id' => 19,
            ),
            373 => 
            array (
                'permission_id' => 84,
                'role_id' => 19,
            ),
            374 => 
            array (
                'permission_id' => 86,
                'role_id' => 19,
            ),
            375 => 
            array (
                'permission_id' => 97,
                'role_id' => 19,
            ),
            376 => 
            array (
                'permission_id' => 85,
                'role_id' => 19,
            ),
            377 => 
            array (
                'permission_id' => 43,
                'role_id' => 19,
            ),
            378 => 
            array (
                'permission_id' => 36,
                'role_id' => 19,
            ),
            379 => 
            array (
                'permission_id' => 98,
                'role_id' => 19,
            ),
            380 => 
            array (
                'permission_id' => 71,
                'role_id' => 19,
            ),
            381 => 
            array (
                'permission_id' => 72,
                'role_id' => 19,
            ),
            382 => 
            array (
                'permission_id' => 80,
                'role_id' => 19,
            ),
            383 => 
            array (
                'permission_id' => 79,
                'role_id' => 19,
            ),
            384 => 
            array (
                'permission_id' => 67,
                'role_id' => 19,
            ),
            385 => 
            array (
                'permission_id' => 68,
                'role_id' => 19,
            ),
            386 => 
            array (
                'permission_id' => 69,
                'role_id' => 19,
            ),
            387 => 
            array (
                'permission_id' => 70,
                'role_id' => 19,
            ),
            388 => 
            array (
                'permission_id' => 41,
                'role_id' => 20,
            ),
            389 => 
            array (
                'permission_id' => 40,
                'role_id' => 20,
            ),
            390 => 
            array (
                'permission_id' => 2,
                'role_id' => 20,
            ),
            391 => 
            array (
                'permission_id' => 44,
                'role_id' => 20,
            ),
            392 => 
            array (
                'permission_id' => 1,
                'role_id' => 20,
            ),
            393 => 
            array (
                'permission_id' => 4,
                'role_id' => 20,
            ),
            394 => 
            array (
                'permission_id' => 5,
                'role_id' => 20,
            ),
            395 => 
            array (
                'permission_id' => 6,
                'role_id' => 20,
            ),
            396 => 
            array (
                'permission_id' => 7,
                'role_id' => 20,
            ),
            397 => 
            array (
                'permission_id' => 99,
                'role_id' => 20,
            ),
            398 => 
            array (
                'permission_id' => 100,
                'role_id' => 20,
            ),
            399 => 
            array (
                'permission_id' => 81,
                'role_id' => 20,
            ),
            400 => 
            array (
                'permission_id' => 82,
                'role_id' => 20,
            ),
            401 => 
            array (
                'permission_id' => 39,
                'role_id' => 20,
            ),
            402 => 
            array (
                'permission_id' => 45,
                'role_id' => 20,
            ),
            403 => 
            array (
                'permission_id' => 9,
                'role_id' => 20,
            ),
            404 => 
            array (
                'permission_id' => 8,
                'role_id' => 20,
            ),
            405 => 
            array (
                'permission_id' => 65,
                'role_id' => 20,
            ),
            406 => 
            array (
                'permission_id' => 66,
                'role_id' => 20,
            ),
            407 => 
            array (
                'permission_id' => 11,
                'role_id' => 20,
            ),
            408 => 
            array (
                'permission_id' => 10,
                'role_id' => 20,
            ),
            409 => 
            array (
                'permission_id' => 13,
                'role_id' => 20,
            ),
            410 => 
            array (
                'permission_id' => 12,
                'role_id' => 20,
            ),
            411 => 
            array (
                'permission_id' => 57,
                'role_id' => 20,
            ),
            412 => 
            array (
                'permission_id' => 58,
                'role_id' => 20,
            ),
            413 => 
            array (
                'permission_id' => 55,
                'role_id' => 20,
            ),
            414 => 
            array (
                'permission_id' => 56,
                'role_id' => 20,
            ),
            415 => 
            array (
                'permission_id' => 15,
                'role_id' => 20,
            ),
            416 => 
            array (
                'permission_id' => 14,
                'role_id' => 20,
            ),
            417 => 
            array (
                'permission_id' => 17,
                'role_id' => 20,
            ),
            418 => 
            array (
                'permission_id' => 16,
                'role_id' => 20,
            ),
            419 => 
            array (
                'permission_id' => 19,
                'role_id' => 20,
            ),
            420 => 
            array (
                'permission_id' => 18,
                'role_id' => 20,
            ),
            421 => 
            array (
                'permission_id' => 3,
                'role_id' => 20,
            ),
            422 => 
            array (
                'permission_id' => 48,
                'role_id' => 20,
            ),
            423 => 
            array (
                'permission_id' => 46,
                'role_id' => 20,
            ),
            424 => 
            array (
                'permission_id' => 21,
                'role_id' => 20,
            ),
            425 => 
            array (
                'permission_id' => 20,
                'role_id' => 20,
            ),
            426 => 
            array (
                'permission_id' => 59,
                'role_id' => 20,
            ),
            427 => 
            array (
                'permission_id' => 60,
                'role_id' => 20,
            ),
            428 => 
            array (
                'permission_id' => 61,
                'role_id' => 20,
            ),
            429 => 
            array (
                'permission_id' => 62,
                'role_id' => 20,
            ),
            430 => 
            array (
                'permission_id' => 63,
                'role_id' => 20,
            ),
            431 => 
            array (
                'permission_id' => 64,
                'role_id' => 20,
            ),
            432 => 
            array (
                'permission_id' => 47,
                'role_id' => 20,
            ),
            433 => 
            array (
                'permission_id' => 101,
                'role_id' => 20,
            ),
            434 => 
            array (
                'permission_id' => 22,
                'role_id' => 20,
            ),
            435 => 
            array (
                'permission_id' => 23,
                'role_id' => 20,
            ),
            436 => 
            array (
                'permission_id' => 32,
                'role_id' => 20,
            ),
            437 => 
            array (
                'permission_id' => 73,
                'role_id' => 20,
            ),
            438 => 
            array (
                'permission_id' => 74,
                'role_id' => 20,
            ),
            439 => 
            array (
                'permission_id' => 96,
                'role_id' => 20,
            ),
            440 => 
            array (
                'permission_id' => 95,
                'role_id' => 20,
            ),
            441 => 
            array (
                'permission_id' => 94,
                'role_id' => 20,
            ),
            442 => 
            array (
                'permission_id' => 93,
                'role_id' => 20,
            ),
            443 => 
            array (
                'permission_id' => 77,
                'role_id' => 20,
            ),
            444 => 
            array (
                'permission_id' => 78,
                'role_id' => 20,
            ),
            445 => 
            array (
                'permission_id' => 24,
                'role_id' => 20,
            ),
            446 => 
            array (
                'permission_id' => 25,
                'role_id' => 20,
            ),
            447 => 
            array (
                'permission_id' => 26,
                'role_id' => 20,
            ),
            448 => 
            array (
                'permission_id' => 27,
                'role_id' => 20,
            ),
            449 => 
            array (
                'permission_id' => 31,
                'role_id' => 20,
            ),
            450 => 
            array (
                'permission_id' => 30,
                'role_id' => 20,
            ),
            451 => 
            array (
                'permission_id' => 29,
                'role_id' => 20,
            ),
            452 => 
            array (
                'permission_id' => 28,
                'role_id' => 20,
            ),
            453 => 
            array (
                'permission_id' => 50,
                'role_id' => 20,
            ),
            454 => 
            array (
                'permission_id' => 49,
                'role_id' => 20,
            ),
            455 => 
            array (
                'permission_id' => 51,
                'role_id' => 20,
            ),
            456 => 
            array (
                'permission_id' => 52,
                'role_id' => 20,
            ),
            457 => 
            array (
                'permission_id' => 76,
                'role_id' => 20,
            ),
            458 => 
            array (
                'permission_id' => 75,
                'role_id' => 20,
            ),
            459 => 
            array (
                'permission_id' => 53,
                'role_id' => 20,
            ),
            460 => 
            array (
                'permission_id' => 54,
                'role_id' => 20,
            ),
            461 => 
            array (
                'permission_id' => 37,
                'role_id' => 20,
            ),
            462 => 
            array (
                'permission_id' => 42,
                'role_id' => 20,
            ),
            463 => 
            array (
                'permission_id' => 38,
                'role_id' => 20,
            ),
            464 => 
            array (
                'permission_id' => 35,
                'role_id' => 20,
            ),
            465 => 
            array (
                'permission_id' => 34,
                'role_id' => 20,
            ),
            466 => 
            array (
                'permission_id' => 92,
                'role_id' => 20,
            ),
            467 => 
            array (
                'permission_id' => 33,
                'role_id' => 20,
            ),
            468 => 
            array (
                'permission_id' => 88,
                'role_id' => 20,
            ),
            469 => 
            array (
                'permission_id' => 87,
                'role_id' => 20,
            ),
            470 => 
            array (
                'permission_id' => 83,
                'role_id' => 20,
            ),
            471 => 
            array (
                'permission_id' => 84,
                'role_id' => 20,
            ),
            472 => 
            array (
                'permission_id' => 86,
                'role_id' => 20,
            ),
            473 => 
            array (
                'permission_id' => 97,
                'role_id' => 20,
            ),
            474 => 
            array (
                'permission_id' => 85,
                'role_id' => 20,
            ),
            475 => 
            array (
                'permission_id' => 43,
                'role_id' => 20,
            ),
            476 => 
            array (
                'permission_id' => 36,
                'role_id' => 20,
            ),
            477 => 
            array (
                'permission_id' => 98,
                'role_id' => 20,
            ),
            478 => 
            array (
                'permission_id' => 71,
                'role_id' => 20,
            ),
            479 => 
            array (
                'permission_id' => 72,
                'role_id' => 20,
            ),
            480 => 
            array (
                'permission_id' => 80,
                'role_id' => 20,
            ),
            481 => 
            array (
                'permission_id' => 79,
                'role_id' => 20,
            ),
            482 => 
            array (
                'permission_id' => 67,
                'role_id' => 20,
            ),
            483 => 
            array (
                'permission_id' => 68,
                'role_id' => 20,
            ),
            484 => 
            array (
                'permission_id' => 69,
                'role_id' => 20,
            ),
            485 => 
            array (
                'permission_id' => 70,
                'role_id' => 20,
            ),
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
