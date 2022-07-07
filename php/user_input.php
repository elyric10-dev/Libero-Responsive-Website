
<?php
    session_start();
    include '../includes/style.php';

    include '../connection.php';

    
    $postcode = $_SESSION['postcode'];
    $email = $_SESSION['email'];

//GET DATA FROM DATABASE
    
    
    $postcodes = array(
        "Alcantara" => '6033',
        "Alcoy" => '6023',
        "Alegria" => '6030',
        "Aloguinsan" => '6040',
        "Argao" => '6021',
        "Asturias" => '6042',
        "Badian" => '6031',
        "Balamban" => '6041',
        "Bantayan" => '6042',
        "Barile" => '6036',
        "Bogo City" => '6010',
        "Boljoon" => '6024',
        "Borbon" => '6008',
        "Carcar City" => '6019',
        "Carmen" => '6005',
        "Catmon" => '6006',
        "Cebu City" => '6000',
        "Compostela" => '6003',
        "Consolacion" => '6001',
        "Cordova" => '6017',
        "Daang-Bantayan" => '6013',
        "Dalaguete" => '6022',
        "Danao" => '6004',
        "Dumanjug" => '6035',
        "Ginatilan" => '6026',
        "Lapu-Lapu City" => '6015',
        "Liloan" => '6002',
        "Mactan Airport" => '6016',
        "Madridejos" => '6053',
        "Malabuyoc" => '6029',
        "Mandaue City" => '6014',
        "Medellin" => '6012',
        "Minglanilla" => '6046',
        "Moalboal" => '6032',
        "Naga" => '6037',
        "Oslob" => '6025',
        "Pilar" => '6048',
        "Pinamungahan" => '6039',
        "Poro" => '6049',
        "Ronda" => '6034',
        "Samboan" => '6027',
        "San Fernando" => '6018',
        "San Francisco" => '6050',
        "San Remegio" => '6011',
        "Santa Fe" => '6047',
        "Santander" => '6026',
        "Sibonga" => '6020',
        "Sogod" => '6007',
        "Tabogon" => '6009',
        "Tabuelan" => '6044',
        "Talisay City" => '6045',
        "Toledo City" => '6038',
        "Tuburan" => '6043',
        "Todela" => '6051'
    );
    $current_location = array_search($postcode,$postcodes,true);    
    $phone = $get_all_data["phone"];
    $selection = $get_all_data["selection"];
?>

<div class="pop_up_container">
    <div class="close_main_popup_container"><a href="http://localhost:8080/Libero_V3.0_WITH_BACKEND"><b>X</b></a></div>
        <div class="pop_up_items">
            <div class="map_popup_container">
                <div class="close_main_popup_container"><a href="#" class="hide_map"><b>X</b></a></div>
               
                <div style="width: 100%"><iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=1000&amp;hl=en&amp;q=<?php echo $current_location; ?>+(My%20Business%20Name)&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/wearable-gps/">adventure gps</a></iframe></div>
            
            </div>

            <div class="map_details_container">
                <div class="text"><?php echo "Email: <br><b class='fonts'>".$email."</b class='fonts'><br>Phone: <b class='fonts'>".$phone."</b><br>Postcode: <b class='fonts'>".$postcode."</b>";
                    echo "<h3>";
                    echo $current_location;
    
                    ?>
                    <div class="map_container">
                        <span><a href="#" class="show_map">Show on map</a></span>
                    </div>
                </div>
                <div class="text"><?php
                    if($selection === 'yes'){
                        echo "<p>";
                        echo "And you <b>AGREE</b> to garbage separation and recycling schemes across your area.";
                        
                    }
                    else{
                        echo "And you <b>DON'T AGREE</b> to garbage separation and recycling schemes across your area.";
                    }
                ?> 
                </div>
            </div>
        </div>
</div>
<script>
const map_popup_container = document.querySelector('.map_popup_container')
const show_map = document.querySelector('.show_map')
const hide_map = document.querySelector('.hide_map')

show_map.addEventListener('click', ()=>{
    map_popup_container.classList.add('active')
})
hide_map.addEventListener('click', ()=>{
    map_popup_container.classList.remove('active')
})
</script>