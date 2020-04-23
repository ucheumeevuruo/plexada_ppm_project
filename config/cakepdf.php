return [
'CakePdf' => [
'engine' => [
'className' => 'JMischer/CakePDFreactor.PDFreactor',
'client' => [
'className' => '\com\realobjects\pdfreactor\webservice\client\PDFreactor',
'serviceUrl' => 'http://localhost:9423/service/rest',
],
'options' => [
// PDFreactor configuration ...
]
]
]
];