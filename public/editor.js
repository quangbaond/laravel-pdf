
        
$("#cvo-profile-title").editable(url , {
    id   : 'position',
    name : 'value',
    onblur: "submit",
    placeholder: "&nbsp;",
    tooltip: "Click to edit",
    submitdata : {"_token" : token},

});
// cvo-additional-information-details
$("#cvo-profile-fullname").editable(url , {
    id   : 'fullname',
    name : 'value',
    onblur: "submit",
    placeholder: "&nbsp;",
    tooltip: "Click to edit",
    submitdata : {"_token" : token},
});
$("#cvo-profile-gender").editable(url , {
    id   : 'gender',
    name : 'value',
    onblur: "submit",
    placeholder: "&nbsp;",
    tooltip: "Click to edit",
    submitdata : {"_token" : token},
});



$("#cvo-profile-dob").editable(url , {
    id   : 'birthday',
    name : 'value',
    // data : {token : token},
    submitdata : {"_token" : token},
    onblur: "submit",
    placeholder: "&nbsp;",
    tooltip: "Click to edit",
    
});
$("#cvo-profile-phone").editable(url , {
    id   : 'phone',
    name : 'value',
    onblur: "submit",
    placeholder: "&nbsp;",
    tooltip: "Click to edit",
    submitdata : {"_token" : token},
});
$("#cvo-profile-email").editable(url , {
    id   : 'email',
    name : 'value',
    onblur: "submit",
    placeholder: "&nbsp;",
    tooltip: "Click to edit",
    submitdata : {"_token" : token},
});
$("#cvo-profile-website").editable(url , {
    id   : 'website',
    name : 'value',
    onblur: "submit",
    placeholder: "&nbsp;",
    tooltip: "Click to edit",
    submitdata : {"_token" : token},
});
$("#cvo-profile-address").editable(url , {
    id   : 'address',
    name : 'value',
    onblur: "submit",
    placeholder: "&nbsp;",
    tooltip: "Click to edit",
    submitdata : {"_token" : token},
});
$("#cvo-objective-objective").editable(url , {
    id   : 'target',
    name : 'value',
    onblur: "submit",
    placeholder: "&nbsp;",
    tooltip: "Click to edit",
    type      : 'textarea',
    cssclass  : 'textarea',
    submitdata : {"_token" : token},
    width      :'100%',
    height     :'150px',

});
$("#cvo-interests-interests").editable(url , {
    id   : 'interests',
    name : 'value',
    onblur: "submit",
    placeholder: "&nbsp;",
    tooltip: "Click to edit",
    submitdata : {"_token" : token},
    width : '100%'
});
$(".start").editable(url , {
    id   : 'interests',
    name : 'value',
    onblur: "submit",
    placeholder: "&nbsp;",
    tooltip: "Click to edit",
    submitdata : {"_token" : token},
});
$(".end").editable(url , {
    id   : 'interests',
    name : 'value',
    onblur: "submit",
    placeholder: "&nbsp;",
    tooltip: "Click to edit",
    submitdata : {"_token" : token},
});
$("#cvo-additional-information-details").editable(url , {
    id   : 'description',
    name : 'value',
    onblur: "submit",
    placeholder: "&nbsp;",
    tooltip: "Click to edit",
    submitdata : {"_token" : token},
});

        
        
        
        
