<?php
$menu = [
    [
        "nama" => "Beranda"
    ],
    [
        "nama" => "Berita",
        "subMenu" => [
            [
                "nama" => "Wisata",
                "subMenu" => [
                    [
                        "nama" => "Pantai"
                    ],
                    [
                        "nama" => "Gunung"
                    ]
                ]
            ],
            [
                "nama" => "Kuliner"
            ],
            [
                "nama" => "Hiburan"
            ]
        ]
    ],
    [
        "nama" => "Tentang"
    ],
    [
        "nama" => "Kontak"
    ],
];

// Function to display the menu
function tampilkanMenu($menu) {
    echo "<ul>";
    foreach ($menu as $item) {
        echo "<li>" . $item["nama"];
        if (isset($item["subMenu"])) {
            tampilkanMenu($item["subMenu"]); // Recursive call for sub-menu
        }
        echo "</li>";
    }
    echo "</ul>";
}

// Display the menu
tampilkanMenu($menu);
?>
