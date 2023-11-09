// các xử lý định dạng cho website 
//-----------------------------------------create-bill.html---------------------------------------------
// kiểm tra họ và tên nhập vào có hợp lệ không
const checkFullname = (fn,err) =>{
	// lấy thông tin ô nhập họ tên, số điện thoại, địa chỉ
	let fullname = fn.value;
	
	
	// tham chiếu đối tượng lỗi
	let viewFullname = fn;
	

	
	// tham chiếu vị trí báo lỗi
	let errFullname = err;
	
	
	
	// biến kiểm tra 
	let validFullname = true;
	
	errFullname.style.paddingTop = "5px";
	errFullname.style.fontSize = "12px";
	// biến thông báo lỗi
	let message ="";
	if(fullname == ""){
		validFullname = false;
		message = "Không được để trống mục họ và tên!";
	}
	else{
		if(fullname.length<10){
			validFullname = false;
			message = "Họ và tên quá ngắn. Không hợp lệ!";
		}
	}
	
	
	
	// kiểm tra
	if(validFullname){
		errFullname.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
		errFullname.style.color = "green";
	}
	else{
		errFullname.innerHTML=message;
		errFullname.style.color = "red";
		
	}
	
	
	return validFullname;
}

// kiểm tra số điện thoại nhập vào có hợp lệ không
const checkPhone = (_phone,err) => {
	
	let phone = _phone.value;
	let viewPhone = _phone;
	let errPhone = err;
	let validPhone = true;
	let message ="";
	errPhone.style.paddingTop = "5px";
	errPhone.style.fontSize = "12px";
	if(phone==""){
		validPhone = false;
		message="Không được để trống mục số điện thoại!";
	}
	else{
		var pattern = /[a-z]/;
		if(pattern.test(phone)){
			validPhone = false;
			message = "Số điện thoại không thể chứa kí tự a->z!";
	}
		else{
			if(phone.length!=10){
				validPhone = false;
				message = "Số điện thoại phải đủ 10 chữ số";
			}
		}
		
	}
	if(validPhone){
		errPhone.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
		errPhone.style.color = "green";
	}
	else{
		errPhone.innerHTML = message;
		errPhone.style.color = "red";
		
	}
	return validPhone;

}

// kiểm tra dữ liệu địa chỉ nhập vào có hợp lệ không
const checkAddress = (_address,err) =>{
	
	let address = _address.value;
	let viewAddress = _address;
	let errAddress = err;
	let validAddress = true;
	let message ="";
	errAddress.style.paddingTop="5px";
	errAddress.style.fontSize="12px";
	if(address==""){
		validAddress = false;
		message ="Không được để trống mục địa chỉ!";
	}
	else{
		if(address.length<10){
			validAddress = false;
			message="Địa chỉ quá ngắn. Không hợp lệ!";
		}
		
	}
	if(validAddress){
		errAddress.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
		errAddress.style.color = "green";
	}
	else{
		errAddress.innerHTML = message;
		errAddress.style.color = "red";
		
	}
	return validAddress;


	
}

const checkProductName = () => {
	
	let productName = document.getElementById("inputProductName").value; //lấy giá trị người dùng nhập vào ô textbox tên hàng
	let viewProductName = document.getElementById("inputProductName"); // tham chiếu đối tượng inputProductName
	let errProductName = document.getElementById("errProductName"); // tham chiếu tới vị trí báo lỗi
	let validProductName = true;
	let message="";
	//kiểm tra điều kiện
	errProductName.style.paddingTop = "5px";
	errProductName.style.color = "green";
	errProductName.style.fontSize = "12px";
	if(productName == ""){
		validProductName = false;
		message="Không được để trống mục tên hàng!";
	}
	else{
		if(productName.length<10){
			validProductName = false;
			message="Tên hàng quá ngắn. Không hợp lệ!";
		}
	}
	if(validProductName){
		errProductName.innerHTML='<i class="fa-regular fa-circle-check"></i>';
		errProductName.style.color="green";
	}
	else{
		errProductName.innerHTML=message;
		errProductName.style.color="red";
		
	}
	return validProductName;
}

const checkTotal = () => {
	let total = document.getElementById("inputTotal").value;
	let errTotal = document.getElementById("errTotal");
	
	let validTotal = true;
	let message = "";
	if(total==""){
		validTotal = false;
		message = "Không được để trống mục số lượng!";
	}
	else{
		var pattern = /[a-z]/;
		if(pattern.test(total)){
			validTotal = false;
			message = "Mục số lượng chỉ được chứ các số nguyên!";
		}
		else{
			if(total%1!=0){
				validTotal=false;
				message = "Không được nhập số thập phân!";
			}
			else{
				if(total<=0){
					validTotal = false;
					message = "Số lượng phải lớn hơn 0";
				}
			}
		}
	}
	errTotal.style.fontSize = "12px";
	if(validTotal){
		errTotal.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
		errTotal.style.color = "green";
		errTotal.style.paddingTop = "5px";
	}
	else{
		errTotal.innerHTML = message;
		errTotal.style.color = "red";
		errTotal.style.paddingTop = "5px";
	}
	return validTotal;
}
const checkWeight = ()=>{
	let weight = document.getElementById("inputWeight").value;
	let errWeight = document.getElementById("errWeight");
	let validWeight = true;
	let message = "";
	errWeight.style.paddingTop = "5px";
	errWeight.style.color = "green";
	errWeight.style.fontSize = "12px";
	if(weight==""){
		validWeight = false;
		message = "Không được để trống mục trọng lượng!";
	}
	else{
		var pattern = /[a-z]/;
		if(pattern.test(weight)){
			validWeight = false;
			message = "Mục trọng lượng không được chứa ký tự chữ cái!";
		}
		else{
			if(weight<=0){
				validWeight = false;
				message = "Trọng lượng phải lớn hơn 0";
			}
		}
		
	}
	if(validWeight){
		errWeight.innerHTML='<i class="fa-regular fa-circle-check"></i>';
	}
	else{
		errWeight.innerHTML = message;
		errWeight.style.color="red";
	}
	return validWeight;
}
const checkPrice = ()=>{
	let price = document.getElementById("inputPrice").value;
	let errPrice = document.getElementById("errPrice");
	let validPrice = true;
	let message = "";
	errPrice.style.paddingTop = "5px";
	errPrice.style.color = "green";
	errPrice.style.fontSize = "12px";
	if(price==""){
		validPrice = false;
		message = "Không được để trống mục giá tiền!";
	}
	else{
		var pattern = /[a-z]/;
		if(pattern.test(price)){
			validPrice = false;
			message = "Mục giá tiền không được chứa ký tự chữ cái!";
		}
		else{
			if(price<=0){
				validPrice = false;
				message = "Gía tiền phải lớn hơn 0";
			}
		}
	}
	if(validPrice){
		errPrice.innerHTML='<i class="fa-regular fa-circle-check"></i>';
	}
	else{
		errPrice.innerHTML = message;
		errPrice.style.color="red";
	}
	return validPrice;
}
const calculatePrice = () =>{
	if((checkWeight())&&(checkPrice())){
		let weight = document.getElementById("inputWeight").value;
		let price = document.getElementById("inputPrice").value;
		let money = 0;
		money = weight * price;
		// hiển thị ra màn hình
		document.getElementById("price-valid-1").innerHTML=money+" VNĐ";
		document.getElementById("price-valid-1").style.color="red";
	}
}
const resetForm = () =>{
	document.getElementById("inputFullname").value = "";
	document.getElementById("inputPhone").value = "";
	document.getElementById("inputAddress").value = "";
	document.getElementById("inputProductName").value = "";
	document.getElementById("inputTotal").value = "";
	document.getElementById("inputWeight").value = "";
	document.getElementById("inputPrice").value = "";
	document.getElementById("price-valid-1").innerHTML = "";
	document.getElementById("price-valid-2").innerHTML = "";
	document.getElementById("price-valid-3").innerHTML = "";
	document.getElementById("time-valid").innerHTML = "";
}
const getInforSender = () =>{
	
	// Lắng nghe message từ window con (file user.html)
	window.addEventListener('message', event => {
	  // Kiểm tra xem message có được gửi từ file user.html không
	  if (event.origin !== window.location.origin) return;

	  // Lấy dữ liệu từ message
	  const username = event.data.username;

	  // Đưa dữ liệu vào thẻ khác
	  const usernameElement = document.getElementById('inputInfor');
	  usernameElement.value = username;
	});

	
}
function passData() {
	// Lấy thẻ input theo ID
	const usernameInput = document.getElementById('username');

	// Gửi dữ liệu tới window cha (file index.html)
	window.parent.postMessage({
	  username: usernameInput.value
	}, '*');

}

const sendNow = ()=>{
	let fn = document.getElementById('inputFullname');
	let errFn = document.getElementById('errFullname');
	let phone = document.getElementById('inputPhone');
	let errPhone = document.getElementById('errPhone');
	let address = document.getElementById('inputAddress');
	let errAddress = document.getElementById('errAddress');
	//let errFn = document.getElementById('errFullname');
	
	if(checkFullname(fn,errFn)&&checkPhone(phone,errPhone)&&checkAddress(address,errAddress)&&checkProductName()&&checkTotal()&&checkWeight()&&checkPrice()){
		document.getElementById("send-now").disabled = false;
	}
	else{
		document.getElementById("send-now").disabled = false;
		if(!checkFullname(fn,errFn)) document.getElementById("inputFullname").focus();
		if(!checkPhone(phone,errPhone)) document.getElementById("inputPhone").focus();
		if(!checkAddress(address,errAddress)) document.getElementById("inputAddress").focus();
		if(!checkProductName()) document.getElementById("inputProductName").focus();
		if(!checkTotal()) document.getElementById("inputTotal").focus();
		if(!checkWeight()) document.getElementById("inputWeight").focus();
		if(!checkPrice()) document.getElementById("inputPrice").focus();
	}
}
//---------------------------------end page create-bill.html-------------------------------------------



//-----------------------------------------------user-profile.html-----------------------------




const checkEmail = () =>{
	let email = document.getElementById("user-profile").email.value;
	let viewEmail = document.getElementById("user-profile").email;
	let errEmail = document.getElementById("errEmail");
	let validEmail = true;
	let message = ""; 
	if(email==""){
		validEmail = false;
		message = "Không được để trống email";
	}
	else{
		if(email.indexOf("@")==-1){
			validEmail = false;
			message = "Bạn nhập không phải là email";
		}
		else{
			var pattern = /\w+@\w+[.]\w/;
			if(!pattern.test(email)){
				validEmail = false;
				message ="Không đúng cấu trúc hộp thư";
			}
			
		}
	}
	errEmail.style.color = "green";
	errEmail.style.paddingTop = "5px";
	errEmail.style.fontSize = "12px";
	if(validEmail){
		errEmail.innerHTML = '<i class="fa-regular fa-circle-check"></i>'
	}
	else{
		errEmail.innerHTML = message;
		errEmail.style.color = "red";
	}
	return validEmail;
}

const checkIdPerson = () => {
	let id = document.getElementById('id-person').value;
	let viewId = document.getElementById('id-person');
	let errId = document.getElementById('errIdPerson');
	let validId=true;
	let message = "";
	if(id==""){
		validId = false;
		message = "Không được để trống mục chứng minh thư";
	}
	else{
		if(id.length<10){
			validId=false;
			message = "Chứng minh thư không được nhỏ hơn 10 số";
		}
		else{
			var pattern1 = /[a-z]/
			var pattern2 = /[~`!@#$%^&*()_+=[]-*/;
			var pattern3 = /[A-Z]/;
			if(pattern1.test(id) || pattern2.test(id) || pattern3.test(id)){
				validId=false;
				message = "Chứng minh thư không được chứa ký tự hoặc ký tự đặc biệt!";
			}
			else{
				if(id%1!=0){
					validId = false;
					message = "Chứng minh thư không thể chứ số thập phân";
				}
			}
		}
	}
	errId.style.color = "green";
	errId.style.fontSize = "12px";
	errId.style.paddingTop = "5px";
	if(validId){
		errId.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
	}
	else{
		
		errId.style.color = "red";
		errId.innerHTML = message;
	}
	return validId;
}
//--------------------------------------------end user-profile.html----------------------------