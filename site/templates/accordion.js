const course = document.getElementsByClassName('course');
for (let index = 0; index < course.length; index++) {
    console.log(course[index])
    course[index].addEventListener('click' , function(){
    
    this.classList.toggle('active')
    
})


}
console.log(course)

