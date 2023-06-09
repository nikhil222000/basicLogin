document.addEventListener("DOMContentLoaded", () => {
    //to check users login history 
    document.getElementById ("loggedInBtn").addEventListener ("click", loggedInBtn, false);
    //fetching sample API
    fetch('https://reqres.in/api/users?page=1')
    .then(response => response.json())
    .then(data => {
        data.data.forEach(function(value,index){
            console.log(value.id);
            generateTableTemplate(value)
        })
    })
    .catch(error => {
        console.error(error);
    });
});
//redirection to login history page
  function loggedInBtn(){
    window.location.href = 'loginTime.php';
  }
  //dynamicaly generating table body as per api response
function generateTableTemplate(item){
    const tableBody = document.getElementById('table_body');
    const row = document.createElement('tr');
    const cell1 = document.createElement('td');
    cell1.textContent = item.id;
    row.appendChild(cell1);
    const cell2 = document.createElement('td');
    cell2.textContent = item.first_name;
    row.appendChild(cell2);
    const cell3 = document.createElement('td');
    cell3.textContent = item.last_name;
    row.appendChild(cell3);
    const cell4 = document.createElement('td');
    cell4.textContent = item.email;
    row.appendChild(cell4);
    const cell5 = document.createElement('td');
    const imgtag=cell5.appendChild(document.createElement('img'))
    imgtag.setAttribute('src', item.avatar)
    row.appendChild(cell5);
   tableBody.appendChild(row);
}