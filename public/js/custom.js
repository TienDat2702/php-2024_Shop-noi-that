const serviceItems = document.querySelectorAll('.service, .pst-r');

function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

function handleScroll() {
    serviceItems.forEach(item => {
        if (isInViewport(item)) {
            item.classList.add('visible');
        }
    });
}

window.addEventListener('scroll', handleScroll);
document.addEventListener('DOMContentLoaded', handleScroll);


// cuộn menu
//pageYOffset trả về các pixel mà tài liệu đã cuộn từ góc trên bên trái của cửa sổ.
var prevScrollpos = window.pageYOffset; 
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
    // prevScrollpos trước vị trí cuộn
    // currentScrollPos vị trí cuộn hiện tại
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0px"; 
            document.getElementById("navbar").style.transition = "0.3s ease"
        } else {
            document.getElementById("navbar").style.top = "-200px"; 
            document.getElementById("navbar").style.transition = "0.5s ease-in" 
        }

  
  prevScrollpos = currentScrollPos;
}



// see more danh mục
document.addEventListener('DOMContentLoaded', function() {
    const showMoreButton = document.querySelector('.show-more');
    const list = document.querySelector('.list');

    showMoreButton.addEventListener('click', function() {
        if (list.classList.contains('expanded')) {
            list.classList.remove('expanded');
            showMoreButton.textContent = 'See More';
        } else {
            list.classList.add('expanded');
            showMoreButton.textContent = 'See Less';
        }
    }); 
});



// hiện thumbnail trang detail

document.addEventListener("DOMContentLoaded", function() {
    const largeImage = document.getElementById("large-image");
    const thumbnails = document.querySelectorAll(".thumbnail");

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener("click", function() {
            const thumbnailSrc = this.getAttribute("src");
            largeImage.setAttribute("src", thumbnailSrc);
        });
    });
});

// scroll thumbnail
document.getElementById('next').onclick = function(){
    const widthItem = document.querySelector('.item').offsetWidth;
    document.getElementById('formList').scrollLeft += widthItem;
}

document.getElementById('prev').onclick = function(){
    const widthItem = document.querySelector('.item').offsetWidth;
    document.getElementById('formList').scrollLeft -= widthItem; 
}

// Hàm cập nhật số lượng sản phẩm
function updateQuantity(productId, action) {
    const form = document.querySelector(`input[value="${productId}"]`).closest('form');
    let input = form.querySelector('.quantity-input');
    let currentQuantity = parseInt(input.value);

    if (action === 'increase') {
        input.value = currentQuantity + 1;
    } else if (action === 'decrease' && currentQuantity > 1) {
        input.value = currentQuantity - 1;
    }

    // Sau khi cập nhật giá trị trong input, gửi form để cập nhật trên server
    form.submit();
}


function updateQuantity(productId, action) {
    let quantityInput = document.querySelector(`input[name='quantity'][data-product-id='${productId}']`);
    let currentQuantity = parseInt(quantityInput.value);

    if (action === 'increase') {
        quantityInput.value = currentQuantity + 1;
    } else if (action === 'decrease') {
        if (currentQuantity > 1) {
            quantityInput.value = currentQuantity - 1;
        }
    }

    // Gửi yêu cầu AJAX đến máy chủ để cập nhật số lượng trong CSDL
    let formData = new FormData();
    formData.append('product_id', productId);
    formData.append('quantity', quantityInput.value);

    fetch(`/cart/update/${productId}`, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    }).then(response => {
        if (response.ok) {
            console.log('Số lượng đã được cập nhật thành công');
        } else {
            console.error('Lỗi khi cập nhật số lượng');
        }
    }).catch(error => {
        console.error('Lỗi khi gửi yêu cầu AJAX: ', error);
    });
}
