var check = false;
function getId(id_food){
    
    document.getElementById('food_display_'+id_food).submit();
}
const checkQuantityProduct = () =>{
    let curQuantity = parseInt(document.getElementById('quantityOfProduct').innerHTML); // lấy số lượng hiện có trong csdl
    let inputQuatity = document.getElementById('quantityFood').value;
    let viewErr = document.getElementById('quantityErr');
    let message="";
    let valid = true;
    if(inputQuatity<=0){
        valid = false;
        message = "Số lượng phải lớn hơn 0";
    }
    else{
        if(curQuantity<inputQuatity){
            valid=false;
            message = "Số lượng trong kho không đủ";
        }
    }
    if(!valid){
        viewErr.innerHTML = message;
        viewErr.style.color = 'red';
    }
    else{
        viewErr.innerHTML = "";
    }
}
const getSession = () => {
    sessionStorage.setItem('id_food', document.getElementById('id_food').value);
}
const getValueIdFood = () =>{
    return sessionStorage.getItem('id_food');
}
const signUp = () => {
    document.getElementById('signin').value="false";
}   
function displayNotification(message, isSuccess) {
    var notification = document.createElement("div");
    notification.style.position = "fixed";
    notification.style.top = "70px";
    notification.style.right = "10px";
    notification.style.color = isSuccess ? "green" : "red";
    notification.style.padding = "10px";
    notification.style.fontWeight = "bold";
    notification.style.borderRadius = "5px";
    notification.style.zIndex = "100000";
    notification.textContent = message;
    document.body.appendChild(notification);
    setTimeout(function() {
        document.body.removeChild(notification);
    }, 3000); // Xóa thông báo sau 3 giây (có thể điều chỉnh thời gian tùy ý)
}