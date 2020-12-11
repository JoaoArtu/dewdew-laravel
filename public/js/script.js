const cpfInput = document.querySelector('[name="cpf"]');
const cpfMask = new Inputmask("999.999.999-99");
cpfInput && cpfMask.mask(cpfInput);

const precoInput = document.querySelector('[name="preco"]');
const precoMask = new Inputmask("99.99");
precoInput && precoMask.mask(precoInput);
