
const cursor = document.getElementById('customMousePointer')

document.addEventListener('mouseover', (e) => {

        cursor.setAttribute('style', 'top:' + e.pageY - 10 + 'px; left: ' + e.pageX - 10 + 'px;')
    })