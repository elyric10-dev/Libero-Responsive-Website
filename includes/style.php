
<style>
body{
    background-color: #d0d0d0;
    display: grid;
    place-items: center;
}
.pop_up_container {
    position: absolute;
    display: grid;
    place-items: center;
    width: 100%;
    height: 100%;
    min-width: 320px;
    max-width: 1480px;
    background-color: rgba(255, 255, 255, 0.5);
    z-index: 1;
}
.close_main_popup_container{
    position: absolute;
    top: 0;
    right: 0;
    margin: 10px 10px;
    width: 100px;
    height: 100px;
    background: rgba(255,120,120,0.5);
    transition: 0.5s;
    border-radius: 10px;
    cursor: pointer;
    border: 1px solid rgba(0,0,0,0.2);
    z-index: 1;
}
.close_main_popup_container:hover{
    background: rgba(255,120,120,9);
    border: 1px solid rgba(0,0,0,0.5);
}
.close_main_popup_container a{
    display: grid;
    place-items: center;
    width: 100%;
    height: 100%;
    text-decoration: none;
    font-size: 30px;
    font-weight: 0;
    color: black;
    transition: 0.5s;
}
.close_main_popup_container:hover a{
    color: white;
}
.pop_up_items {
    position: relative;
    display: grid;
    place-items: center;
    border-radius: 20px;
    width: 100%;
    height: 100%;
    background-color: #f0f0f0;
    color: black;
    text-align: center;
    overflow: hidden;
}
.text{
    font-size: 4rem;
    font-weight: 500;
}

h3{
    font-size: 5rem;
    color: rgba(50,200,50);
}
.map_container{
    font-size: 3rem;
    font-weight: 700;
}
.map_container span a{
    color: rgba(120,120,255,0.8);
    text-decoration: none;
    transition: 0.3s;
}
.map_container span a:hover{
    color: rgba(120,120,255);
    text-decoration: underline;
}
.map_popup_container{
    display: none;
}
.map_popup_container.active{
    display: block;
    position: absolute;
    border-radius: 20px;
    width: 100%;
    height: 100%;
    background-color: #00a0a0;
    animation: show_map 0.5s ease forwards;
    bottom: -100%;
}
@keyframes show_map {
    0% {
        bottom: -100%;
    }
    100% {
        bottom: 0%;
    }
}
.fonts{
    color: rgba(0,0,0,0.8);
}
@media only screen and (min-width: 768px){
    .text {
        font-size: 2rem;
        font-weight: 500;
    }
    h3 {
        font-size: 2.5rem;
    }
        .map_container span a {
        font-size: .5em;
    }
    .close_main_popup_container {
        width: 60px;
        height: 60px;
    }
    .pop_up_items {
        width: 100%;
        height: 100%;
}
}
@media only screen and (min-width: 1024px){
    .text {
        font-size: 1.7rem;
        font-weight: 500;
    }
    h3 {
        font-size: 2rem;
    }
        .map_container span a {
        font-size: .4em;
    }
    .close_main_popup_container {
        width: 50px;
        height: 50px;
    }
    .pop_up_items {
        width: 100%;
        height: 100%;
}
}
/*PHP START HERE */
</style>