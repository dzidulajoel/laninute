const theme_button = document.querySelector(".theme");
const index = document.querySelector(".index");

theme_button.addEventListener('click', ()=>{
    theme_button.classList.toggle('theme_button_active');
    index.classList.toggle("index_theme");
})

//===========================================
const links = document.querySelectorAll('.btn_navigations button svg');

links.forEach(link => {
    link.addEventListener('click', function () {
            links.forEach(link => link.classList.remove('active'));
            link.classList.add('active');
    });
});




//============================================
const profile_btn = document.querySelectorAll(".activites_utilisateur ul li");

profile_btn.forEach(link => {
    link.addEventListener('click', function () {
            profile_btn.forEach(link => link.classList.remove('active_profile'));
            link.classList.add('active_profile');
    });
});


const dragDrop = document.querySelector('.microRecord');
// let isDragging = false;
// let shiftX, shiftY;
// let targetX, targetY; 
// let currentX, currentY; 

// dragDrop.onmousedown = function(event) {
//     shiftX = event.clientX - dragDrop.getBoundingClientRect().left;
//     shiftY = event.clientY - dragDrop.getBoundingClientRect().top;

//     dragDrop.style.position = 'absolute';
//     dragDrop.style.zIndex = 1000;
//     document.body.append(dragDrop);

//     targetX = event.pageX - shiftX;
//     targetY = event.pageY - shiftY;
//     currentX = targetX;
//     currentY = targetY;

//     isDragging = true;
//     updatePosition();
// };

// function updatePosition() {
//     if (!isDragging) return;

//     currentX += (targetX - currentX) * 0.1; 
//     currentY += (targetY - currentY) * 0.1;

//     dragDrop.style.left = currentX + 'px';
//     dragDrop.style.top = currentY + 'px';

//     requestAnimationFrame(updatePosition); 
// }

// document.addEventListener('mousemove', (event) => {
//     if (!isDragging) return;
//     targetX = event.pageX - shiftX;
//     targetY = event.pageY - shiftY;
// });

// document.addEventListener('mouseup', () => {
//     isDragging = false;
// });

// dragDrop.ondragstart = function() {
//     return false;
// };



const openRecordTable = document.querySelector(".openRecordTable");

dragDrop.addEventListener('click', () => {
    if (openRecordTable.style.display === "none") {
        openRecordTable.style.display = "block"; 
    } else {
        openRecordTable.style.display = "none";
    }
});

