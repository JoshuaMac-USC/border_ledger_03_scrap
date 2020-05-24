var counter = Number($('#taskCtr').val())

let months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul','Aug', 'Sept', 'Oct', 'Nov','Dec']

let minLength = 5
let maxLength = 20


function initDatePicker(){
    $('#dateInput').datepicker({
        dateFormat: "MM-dd-yy",
        changeMonth: true,
        changeYear:true,
        minDate: new Date,
    })
}
function addTask(newTask){
    
    var dateVar = $('#dateInput').datepicker( "getDate" )
    var flag=0
    var location = $('.locationInput').val()
    let newTaskDate
    if(dateVar!=null){
         newTaskDate= months[dateVar.getMonth()] + " " + dateVar.getDate() + " " + dateVar.getFullYear()
    }
    $('#taskList .task').each(function(){
        if( $(this).find('#taskDescription').text().toUpperCase()===newTask.toUpperCase() &&  newTaskDate == $(this).find('#taskDate').text()){
            flag = 1
        }
    })

    if(flag==1){
        $('#existingTaskWarn').show()
    }

    // if(newTask.length < 5 || newTask.length > 20){
    //     flag=-1
    // }


    // if(flag==-1 && dateVar == null && location == ""){
    //     $('#minCharWarn').show()
    //     $('#pickDateWarn').show()
    //     $('#pickLocWarn').show()
    // }
    if(flag!=1 && location != "" && newTask != " "){
        let newTaskClone = $('#taskPrototype .task').clone()
        console.log('added')

        // if(dateVar != null){
            newTaskClone.find("#taskDescription").text(newTask)
            newTaskClone.find('#taskDate').text(months[dateVar.getMonth()] + " " + dateVar.getDate() + " " + dateVar.getFullYear())
            // if(location != ""){
                newTaskClone.find('#taskLocation').text(location)
                $("#taskList").append(newTaskClone)
                counter++;
        //         $('#taskInput').val(" ")
        //         $('#dateInput').val(" ")
        //         $('#pickLocWarn').hide()
        //     }else{
        //         $('#pickLocWarn').show()
        //     }
           
        //     $('#pickDateWarn').hide()
        // }else{
        //     newTaskClone.find('#taskDate').text(" ")
        //     $('#pickDateWarn').show()
        // }
        $("#taskInput").val(null)
        $("#dateInput").val(null)
        $("#locationInput").val("")
        $('#existingTaskWarn').hide()
        // $('#minCharWarn').hide()
        //  $('#pickDateWarn').hide()
    }
    // else{
    //     $('#existingTaskWarn').show()
    // }
    
}   

$(document).ready(function(){

    initDatePicker()

    $(function(){
        $('#taskValues').validate({
            rules:{
                taskInput:{
                    required: true,
                    minlength: 5,
                    maxlength: 20
                },
                dateInput:{
                    required:true
                },
                location:{
                    required:true
                }
            },
            messages:{
                taskInput:{
                    required: "please input a task description"
                },
                dateInput:{
                    required: "please pick a date"
                },
                location:{
                    required:"please pick a location"
                }
            },
            errorElement: 'div',
            errorLabelContainer: '#errors'
        })
    })

    $('.border').select2({
        placeholder: 'Select a Location'
    });

    $.get("getTime.php",{format:' M-d-y H:i:s e'}, function(res){
        $("#serverTime").text(res)  
    })

    $("#taskInput").on("keypress", function(){
        $('#typingIndicator').show()
        var value = $(this).val()
        // if(value.length < 5 || value.length > 20){
        //     $('#minCharWarn').show()
        // }else{
        //     $('#minCharWarn').hide()
        // }
    })
    $("#taskInput").on('keyup', function(){
        $('#typingIndicator').hide()
    })
    // $('#addTaskBtn').click(function(){
    //     // addTask($('#taskInput').val())
    //     if(counter>0){
    //         $('#taskCtr').text(counter)
    //         $('#taskCtr').show()
    //     }
    // })

    $('#taskValues').submit(()=>{
        addTask($('#taskInput').val())
        if(counter>0){
            $('#taskCtr').text(counter)
            $('#taskCtr').show()
        }
        return false
    })


    $("#taskList").on('click','#removeBtn',function(){
        $(this).parent().remove()
        counter--
        if(counter>0){
            $('#taskCtr').text(counter)
            $('#taskCtr').show()
        }else{
            $('#taskCtr').hide()
        }
    })

    $("#taskList").on('click','#doneBtn',function(){
        let completeTask = $(this).parent().clone()
        counter--
        completeTask.find('#removeBtn').remove()
        completeTask.find('#doneBtn').remove()

        $("#completedTasks").append(completeTask)
        $(this).parent().remove()
        if(counter>0){
            $('#taskCtr').text(counter)
            $('#taskCtr').show()
        }else{
            $('#taskCtr').hide()
        }
    })

})