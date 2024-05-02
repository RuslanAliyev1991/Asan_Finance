// file download
window.onload = function() {
    var name = null;
    var lastname = null;
    var middlename = null;
    var fileName = null;
    if (document.getElementById('head')) {
        fileName = document.getElementById('head').innerHTML;
    }

    if (document.getElementById('name') || document.getElementById('lastname') || document.getElementById('middlename')) {
        name = document.getElementById('name').innerHTML;
        lastname = document.getElementById('lastname').innerHTML;
        middlename = document.getElementById('middlename').innerHTML;
        fileName += '(' + lastname + ' ' + name + ' ' + middlename + ')';
    }
    //alert(name);
    document.getElementById("download").addEventListener("click", () => {
        const content = this.document.getElementById("content");
        var opt = {
            margin: 0,
            filename: fileName + '.pdf',
            image: {
                type: 'jpeg',
                quality: 1
            },
            html2canvas: {
                scale: 1
            },
            jsPDF: {
                unit: '',
                format: 'letter'
            }
        };

        // New Promise-based usage:
        html2pdf().set(opt).from(content).save();
    });
}

// scrool on top

$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 40) {
            $('#topbtn').fadeIn();
        } else {
            $('#topbtn').fadeOut();
        }
    });

    $('#topbtn').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 800);
    });
});