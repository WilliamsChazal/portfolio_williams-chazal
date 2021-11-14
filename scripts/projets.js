function closeModal(uuidv4){

  const modal = document.getElementById(uuidv4)
  document.getElementById('modals').removeChild(modal)
}


async function openProjectDetails(id, title){
  openModal('./../../williams_chazal/parts/details.php?id='+id,'modal_details', title, 100)
  
}
async function openSkills(id, title){
  openModal('skills.php?id='+id,'modal_skills', title, 100)
  
}
async function openSkills(id, title){
  openModal('designs.php?id='+id,'modal_design', title, 100)
  
}
async function openForm(id, title){
  openModal('form.php?id='+id,'modal_contact', title, 100)
  
}

async function openModal(url, eClass,title, zIndex){
  const content =await getText(url)
  const modal =document.createElement('div')
  const uuid = uuidv4()
  modal.setAttribute('id',uuid)
  modal.setAttribute('class',eClass+ ' modal_generic')
  modal.style.zIndex=zIndex
  modal.innerHTML=`<section class='${eClass}'>

  <div class='task_bar'>
              <span>Williams.Chazal > <strong>${title}</strong></span>
              <span ><button class='close' onclick="closeModal('${uuid}')"></button></span>
  </div> 
  <div class='${eClass}--content'>${content}</div>

</section>`
  document.getElementById('modals').appendChild(modal)
  dragElementGeneric(modal)
}
//fetch en JS// 


 async function getText(file) {
  let myObject = await fetch(file);
  console.log(myObject)
  let myText = await myObject.text(); 
  console.log(myText);
  return myText;
} 







