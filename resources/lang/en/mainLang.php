<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Language Lines
    |--------------------------------------------------------------------------
    |
    | Main language lines sorted by files
    | Lines are used multiple times, when they are similar in different views.
    | That means that new lines in this file only appear, when they appeared
    | for the first time while locating the files.
    |
    | -Structure,etc. can be changed, but remember to change all trans() and strings accordingly
    |
    | You want to add a new language? Steps:
    | in config/language.php add it in the following form: 'de' => 'Deutsch',
    | in lara/resources/lang add a new folder + file in this style
    |
    |
    */

    // /app
    // /resources/views
    // /resources/views/errors

    //-----------------------------------------------------------------------------------------------------

    // /resources/views/layouts/master.blade.php
    'notWorkingMail'        => 'Something is not working? Write :Name a mail.',
    'mail'                  => ' a Mail.', //not used
    //'moreInfos'           => 'More informations? Visit the ',
    //'projectsite'         => 'projectsite on GitHub',
    'moreInfosProjectsite'  => 'More informations? Visit the projectsite on GitHub',

    //-----------------------------------------------------------------------------------------------------

    // resources/views
    // resources/views/clubEventView.blade.php
    //Event types ------------------------------------
    'type'                      => 'Type',
    'normalProgramm'            => 'Normal Programm',
    'information'               => 'Information',
    'special'                   => 'Special',
    'LiveBandDJ'                => 'Live Band / Live DJ / Reading',
    'internalEvent'             => 'Internal event',
    'utilization'               => 'Leasing',
    'flooding'                  => 'Flooding',
    'flyersPlacard'             => 'Flyer / poster distribution',
    'marketingFlyersPlacard'    => 'Marketing / Flyer / Posters', //used in legend.blade.php
    'preSale'                   => 'Tickets presale',
    'others'                    => 'Others',
    
    //----------------------------------------------
    
    'begin'                 => 'Start',
    'end'                   => 'End',

    'DV-Time'               => 'Preparations',
    'club'                  => 'Club',
    'internalEventP'        => 'Internal event', // Placeholder string
    'internEventP'          => 'Internal event', //Placeholder string for example used in monthCell.blade.php
    
    'willShowFor'           => 'will be shown for',
    
    'changeEvent'           => 'Change Event',
    'deleteEvent'           => 'Delete Event',
    'confirmDeleteEvent'    => 'Are you sure you want to delete this event? This action can not be undone!',
    
    'additionalInfo'        => 'Additional details',
    'moreDetails'           => 'Internal information',
    
    //Button
    'showMore'              => 'show more',
    'showLess'              => 'show less',
    
    'hideTimes'             => 'Hide times',
    
    'addComment'            => 'add comment here',  //not used Line ClubEventView ~270 Placeholder message and similar
    
    //List of Changes
    'listChanges'           => 'List of changes',

    'work'                  => 'Shift', //Dienst
    'whatChanged'           => 'What was changed?',
    'oldEntry'              => 'Old entry',
    'newEntry'              => 'New entry',
    'whoBlame'              => 'Who is to blame?',
    'whenWasIt'             => 'When was it?',

    //-------------------------------------------------------------------------------------------------------
    
    // resources/views/createClubEventView.blade.php
    'createNewVEvent'       => 'Create new Event', //Veranstaltung
    'createNewEvent'        => 'Create new Event', //Event
    'template'              => 'Template',
    'templateNewSaveQ'      => 'Save as new template?',
    'title'                 => 'Title',
    'subTitle'              => 'Subtitle',
    'error'                 => 'Error',
    
    'showExtern'            => 'Make it visible to guests?',

    'survey'                => 'Survey',

    //blockString line~168
    'showForLoggedInMember'     => 'This event will only be visible to logged in members!',
    'showForExternOrChangeType' => 'To make it visible for guests or to change the event type,',
    'askTheCLOrMM'              => 'ask the club management or marketing managers.',

    'section'               => 'Section',
    'showFor'               => 'Show to',
    
    'passwordEntry'         => 'Password to enter',
    'passwordRepeat'        => 'Confirm Password',
    'passwordDeleteMessage' => 'To delete the password, enter "delete" (without quotation marks) in both fields.',

    'moreInfos'             => 'Additional details',
    'public'                => 'public',
    'details'               => 'Internal information',
    'showOnlyIntern'        => 'only visible to logged in users',

    'backWithoutChange'     => 'Go back without saving changes',
    
    //---------------------------------------------------------------------------------------------------------
    
    // resources/views/editClubEventView.blade.php
    'changeEventJob'        => 'Change Event/Task',
    
    //Lines for editing only with permission
    'noNotThisWay'          => 'No, not this way...',
    'onlyThe'               => 'Only the',
    'clubManagement'        => 'club management',
    'orThe'                 => 'or',
    'marketingManager'      => 'marketing managers',
    'canChangeEventJob'     => 'may change this event/task.',

    'only'                  => 'Only',
    'commaThe'              => ', the ', //line number ~332
    
    //-----------------------------------------------------------------------------------------------------------
    
    // resources/views/createSurveyView.blade.php
    'createNewSurvey'       => 'Create new survey',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // resources/views/editSurveyView.blade.php
    'editSurvey'            => 'Edit survey',
    'confirmDeleteSurvey'   => 'Are you sure you want to delete the survey ":title"?',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // resources/views/surveyView.blade.php
    'description'           => 'Description',
    'surveyDeadlineTo'      => 'The Survey is open till',
    'um'                    => 'at', //better translation needed TODO change key to "at" and change trans() in views
    
    //result messages; can be changed with pluralization
    'noPersonAnswered'      => 'No person has voted yet',
    'onePersonAnswered'     => 'One person already answered',
    'fewPersonAnswered1'    => '', // empty on purpose, because - English grammar ;)
    'fewPersonAnswered2'    => 'persons have answered already.',
    
    //tableau (head)
    'name'                  => 'Name',
    'myClub'                => 'Club',

    'addMe'                 => 'Add Me!',
    
    //Answers
    'yes'                   => 'Yes',
    'no'                    => 'No',
    'noInformation'         => 'No answer given',

    'noClub'                => 'No club',

    'confirmDeleteAnswer'   => 'Do you really want to delete this answer?',
    
    //evaluation; can be changed with pluralization
    'evaluation'            => 'Evaluation',
    'personDidNotAnswer'    => 'Person did not answer.',
    'personsDidNotAnswer'   => 'Persons did not answer.',
    'personAnswered'        => 'Person voted for',
    'personsAnswered'       => 'Persons voted for',
    
    //List of Changes
    'who'                   => 'Who',
    'summary'               => 'Summary',
    'affectedColumn'        => 'Affected column',
    'oldValue'              => 'Old value',
    'newValue'              => 'New value',
    'when'                  => 'When',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // resources/views/monthView.blade.php
    //short weekdays + CW
    'Cw' => 'Week',
    'Mo' => 'Monday',
    'Tu' => 'Tuesday',
    'We' => 'Wednesday',
    'Th' => 'Thursday',
    'Fr' => 'Friday',
    'Sa' => 'Saturday',
    'Su' => 'Sunday',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // resources/views/createSurveyView.blade.php
    'noEventsThisWeek'  => 'No Events this week',
    'noSurveysThisWeek' => 'No Surveys this week',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // resources/views/listView.blade.php
    'for'               => 'For',
    'noEventsPlanned'   => 'no Events are planned',
    'noEventsOn'        => 'No Events on',
    'EventsFor'         => 'Events for',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // resources/views/log.blade.php
    // not translated - international view
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials
    // /resources/views/partials/clubEventByIdSmall.blade.php
    'noResults'         => 'No results',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/editSchedule.blade.php
    'adjustRoster'          => 'Adjust schedule',
    'serviceTypeEnter'      => 'Enter shift type here',
    'weight'                => 'Statistical weight',
    'statisticalEvaluation' => 'Statistical Evaluation',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/filter.blade.php
    'allSections'           => 'All sections',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/legend.blade.php
    //handled in the event type part in the /resources/views/clubEventView.blade.php part
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/monthCell.blade.php
    'internalSurvey'        => 'Internal survey',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/navigation.blade.php
    'month'                 => 'Month',
    'week'                  => 'Week',
    
    //not translated the term 'logs'
    'manageClub'            => 'Manage clubs',
    'manageJobType'         => 'Manage shift types', 
    // TODO use Job for Service - german: Dienst maybe change to Shift - Schicht
    
    'manageTemplate'        => 'Manage templates',
    
    //create button text
    'createAndAddNewEvent'  => 'Add new Event/Task',
    'createAndAddNewSurvey' => 'Add new Survey',
    
    //Member types
    'candidate'             => 'Candidate',
    'veteran'               => 'Veteran',
    'ex-member'             => 'ex-Member',
    'active'                => 'Active',
    'external'              => 'External',

    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/scheduleEntryName.blade.php
    'IDoIt'                 => 'I will do it!', //Ich mach's!
    
    // /resources/views/partials/scheduleEntryStatus.blade.php
    'jobFree'               => 'Shift free',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/surveyAnswerStatus.blade.php
    //no new strings
    
    //-----------------------------------------------------------------------------------------------------------
    // /resources/views/partials/surveyForm.blade.php
    'showOnlyForLoggedInMember' => 'Only visible to logged in users',
    'showResultsOnlyForCreator' => 'Results are only visible to the survey creator',
    'showResultsAfterFillOut'   => 'Results are visible after filling out the survey',

    'passwordSetOptional'       => 'Setting a password is optional',
    
    //Answer and Question options
    'answerOption'          => 'Answer options',
    'question'              => 'Question',
    
    //Questionoptions
    'freeText'              => 'Free Text', 
    //TODO Line ~299 Freitext throws buggy string with trans(), maybe because of Javascript
    'checkbox'              => 'Checkbox',
    'dropdown'              => 'Dropdown',

    'required'              => 'required',
    'addAnswerOption'       => 'Add an answer option',
    'addQuestion'           => 'Add a question',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/weekCellFull.blade.php
    'hide'                  => 'Hide',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/weekCellHidden.blade.php
    'moreDetailsAfterLogInMessage' => 'More details are accessible to members after logging in. :break',
    // 'moreDetailsAfterLogInMessage2' => 'after logging in.', 
    // Merged with line above but there is now way to break the line (format is still ok) 
    // ToDo find a solution for breaking lines

    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/weekCellProtected.blade.php
    // no new strings
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /resources/views/partials/weekCellSurvey.blade.php
    //no new strings
    
    //-----------------------------------------------------------------------------------------------------------
    
    // /public/js ToDo add these strings
    //Maybe To do translate Javascript, tricky, " " can throw error messages
    // /public/js/vedst-script.js
    'errorMessageForgotFilter'              => 'The filter wasn not set! Please add at least one section this event should be shown to.',
    'errorMessageEnterPasswordForShiftPlan' => 'Please enter the password for this schedule:',
    'showTimes'                             => 'Show times',
    //'hideTimes' already exists#
    
    'weekMoSu'                              => 'Week: Monday - Sunday',
    'weekWeTu'                              => 'Week: Wednesday - Tuesday',
    
    //-----------------------------------------------------------------------------------------------------------
    
    // Controller  ToDo add these strings
    // ScheduleEntryController
    // action description
    'addedComment'              => 'Comment added',
    'deletedComment'            => 'Comment deleted',
    'changedComment'            => 'Comment changed',

    'errorMessageAbortDeletion' => 'Error: can not delete, schedule entry does not exist.',

    //SurveyController
    'messageSurveyDeleted'      => 'Survey deleted.',

    //SurveyAnswerController
    'messageSuccessfulVoted'    => 'Successfully voted!',
    'messageSuccessfulDeleted'  => 'Successfully deleted!',

    //-----------------------------------------------------------------------------------------------------------
    
    // placeholder strings (e.g. used in buttons or text fields)
   
    /*
    | instead of { trans('message.key' }} use  Lang::get('message.key') in the view
    */
   
    //ClubEvent
    'addCommentHere'                => 'Add comment here',
    'enterPasswordHere'             => 'Enter password here',
    'placeholderTitleWineEvening'   => 'e.g. Wine evening', //'placeholderTitleWineEvening'
    'placeholderSubTitleWineEvening'=> 'e.g. Life is too short to drink bad wine', //'placeholderSubTitleWineEvening'
    'placeholderPublicInfo'         => 'e.g. Tickets only in presale',
    'placeholderPrivateDetails'     => 'e.g. DJ-table is needed',
    
    //Survey
    'addAnswerHere'                 => 'Add answer here',
    'createSurvey'                  => 'Create survey', //Button text
    
    //Partials
    //Navigation
    'clubNumber'                    => 'Clubnumber',
    'password'                      => 'Password',
    'logIn'                         => 'Login',
    'logOut'                        => 'Logout',
    //ScheduleEntryName
    '=FREI='                        => '=FREI=', //not used yet
    //surveyForm
    'placeholderSurveyTitle'        => 'Title:',
    'placeholderTitleSurvey'        => 'e.g. Participation at the club trip',
    'placeholderDescription'        => 'Description:',
    'placeholderActiveUntil'        => 'Active until:',

    //
];