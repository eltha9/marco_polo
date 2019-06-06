let url = `${window.location.href}mail`

// selectors

let button = document.querySelector('.submit')


button.addEventListener('click', (event)=>{
    event.preventDefault()

    let mail = document.querySelector('.mail').value
    let txt = document.querySelector('textarea').value
    fetch(`${url}?txt=${txt}&mail=${mail}`)
    .then((response)=>{
        return response
    })
    .then((_response)=>{
        console.log("sended")
    })
})




