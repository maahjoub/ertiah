let image = document.querySelectorAll('.std-att');
document.querySelectorAll('.std-att').forEach(item => {
  item.addEventListener('click', event => {
    item.classList.toggle('std-att-show')
  })
})
console.log(image);