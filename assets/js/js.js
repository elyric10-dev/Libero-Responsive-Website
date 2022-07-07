//Opening Search bar
const search_holder = document.querySelector('.search_holder')
search_holder.addEventListener('click', () => {
        const search_now_container = document.querySelector('.search_now_container')
        search_now_container.classList.add('active')
    })
    //Closing Search bar
const search_close_button_holder = document.querySelector('.search_close_button_holder')
search_close_button_holder.addEventListener('click', () => {
        const search_now_container = document.querySelector('.search_now_container')
        search_now_container.classList.remove('active')
    })
    //Opening Change Color
const drawer_holder = document.querySelector('.drawer_holder')
drawer_holder.addEventListener('click', () => {
        const drawer_background_color_holder = document.querySelector('.drawer_background_color_holder')
        drawer_background_color_holder.classList.add('active')
    })
    //Closing Change Color
const drawer_close_button = document.querySelector('.drawer_close_button')
drawer_close_button.addEventListener('click', () => {
    const drawer_background_color_holder = document.querySelector('.drawer_background_color_holder')
    drawer_background_color_holder.classList.remove('active')
})

//Color #1
const drawer_change_color_box1 = document.querySelector('.drawer_change_color_box1')
drawer_change_color_box1.addEventListener('click', () => {
    document.querySelector(':root').style.setProperty('--header_bg_color', 'rgb(10, 35, 61)')
    document.querySelector(':root').style.setProperty('--for_designing_highlight', 'rgb(64, 119, 242)')
})

//Color #2
const drawer_change_color_box2 = document.querySelector('.drawer_change_color_box2')
drawer_change_color_box2.addEventListener('click', () => {
    document.querySelector(':root').style.setProperty('--header_bg_color', 'rgb(61, 10, 22)')
    document.querySelector(':root').style.setProperty('--for_designing_highlight', 'rgb(242, 65, 73)')
})

//Color #3
const drawer_change_color_box3 = document.querySelector('.drawer_change_color_box3')
drawer_change_color_box3.addEventListener('click', () => {
    document.querySelector(':root').style.setProperty('--header_bg_color', 'rgb(22, 10, 61)')
    document.querySelector(':root').style.setProperty('--for_designing_highlight', 'rgb(140, 64, 242)')
})

//Color #4
const drawer_change_color_box4 = document.querySelector('.drawer_change_color_box4')
drawer_change_color_box4.addEventListener('click', () => {
    document.querySelector(':root').style.setProperty('--header_bg_color', 'rgb(29, 61, 10)')
    document.querySelector(':root').style.setProperty('--for_designing_highlight', 'rgb(98, 242, 65)')
})

//Color #5
const drawer_change_color_box5 = document.querySelector('.drawer_change_color_box5')
drawer_change_color_box5.addEventListener('click', () => {
    document.querySelector(':root').style.setProperty('--header_bg_color', 'rgb(94, 63, 32)')
    document.querySelector(':root').style.setProperty('--for_designing_highlight', 'rgb(242, 190, 65)')
})

const postcode = document.querySelector('#postcode')
const radio_buttons = document.querySelectorAll('input[name="select"]')

const submit_button = document.querySelector('.submit_button')
const pop_up_container = document.querySelector('.pop_up_container')


submit_button.addEventListener('click', () => {

    if (postcode.value === "") {
        alert("Fields could not be empty.")
    }
})

//Click to show and hide register and login page
const click_to_login = document.querySelector('.click_to_login')
const click_to_signup = document.querySelector('.click_to_signup')

const login_main_container = document.querySelector('.login_main_container')
const register_main_container = document.querySelector('.register_main_container')

click_to_login.addEventListener('click', () => {
    register_main_container.style.display = "none"
    login_main_container.style.display = "block"
})
click_to_signup.addEventListener('click', () => {
    register_main_container.style.display = "block"
    login_main_container.style.display = "none"
})

//SIGNUP PASSWORD VALIDATOR
function check_pass() {
    const password = document.getElementById('password').value
    const password_not_match_message = document.querySelector('.password_not_match_message')
    if (cpassword.value === "") password_not_match_message.innerHTML = ""
    if (cpassword.value === password) {
        console.log(cpassword + " " + password)
        password_not_match_message.innerHTML = "Password matched"
        password_not_match_message.style.color = "green"
    } else {
        password_not_match_message.innerHTML = "Password not matched"
        password_not_match_message.style.color = "red"
    }
}

//SHOW AND HIDE ERROR OR REGISTERED
const error = document.querySelector('.error')
const registered = document.querySelector('.registered')
const wrong_credential = document.querySelector('.wrong_credential')
setTimeout(() => {
    error.style.display = "none"
    registered.style.display = "none"
    wrong_credential.style.display = "none"
}, 1500);