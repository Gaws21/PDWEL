<?php
// Gawan Ferreira - SP302170X - PDWEL - Noturno
//Exercício 6
/*1---------------------------------------------------------------------------------------*/
//a
function fatorial($numero)
{
	$i = $numero - 1;
	$j = $numero;
	while($i >= 2){
		$j = $j * $i;
		$i = $i - 1;
	}
	return $j;
}

//b
function primo($numero)
{
	//O resultado do somatório das divisões de um número primo deve ser 0
	$resultado = 0;

	/*div_ini: divisor inicial. 
	Um número primo só é divisível por 1 e por ele mesmo.
	Se inicia a divisão até div_ini ser menor ou igual a metade do número
	que estamos avaliando ser primo */
	$div_ini = 2;
	do{
		if($numero % $div_ini == 0){ //se o resto da divisão é igual a 0, então o número tem um terceiro divisor.
			
			//caso isso ocorra, o resultado é incrementado em 1 e o processo se encerra.
			$resultado++;
			break;
		}
		//caso não ocorra, div_ini é incrementado em 1 e o processo se repete.
		$div_ini = $div_ini + 1;
	}
	while($div_ini <= $numero / 2);
	
	//se resultado == 0 quer dizer que o número só é divisível por 1 e ele mesmo, logo verdadeiro para Primo
	if($resultado == 0){
		
		return true;
	}
	else{
		// caso resutlado é diferente de 0, então retornamos False (não primo)
		return false;
	}
}

//c
function numPerfeito($numero){

	//se o número não é um natural não negativo, logo retornamos false (não pefeito)
	if($numero <= 1){
		return false;
	}

	//declara-se um array vazio para armazenar a parte inteira das divisões
	$divisores = array();

	//Iniciamos a divisão pela número natual antecessor ao número que estamos avaliando
	$i = $numero - 1;
	do{
		//avaliamos se i é um divisor do número
		if($numero % $i == 0){
			//caso sim, armazemos esse divisor
			$divisores[] = $i;
		}
		//i é reduzidor em 1 unidade
		$i = $i - 1;
	}
	//enquanto i for maior ou igual a 1 então o processo de divisão se repete
	while($i >= 1);

	//somadivisores: variável que armazena a soma dos divisores do número.
	//iniciamos somadivisores com valor nulo
	$somatorioDividores = 0;

	//count_divisores: quantidade de valores que são divisores do números
	$count_divisores = count($divisores);
	$i = 0;

	//enquanto o iterador i for menor que a quantidade de elementos do array de divisores
	// o processo de soma se repete
	while($i < $count_divisores){
		//somatorioDividores recebe o valor atual da soma + o próximo elemento do array de divisores
		$somatorioDividores = $somatorioDividores + $divisores[$i];

		//o iterador i é incrementado em 1
		$i = $i + 1;
	}
	
	//se o somatorioDividores é igual ao número, então retornamos True (é um número perfeito)
	if($somatorioDividores == $numero){

		return true;
	}

	//Caso não, retornamos false (não é perfeito)
	else{

		return false;
	}
}

/*2---------------------------------------------------------------------------------------*/
//a
function vetorFatoriais($numero){

	//iterador inicial
	$i = 1;

	//array que armazena os fatoriais
	$arrayFatoriais = array();

	//enquanto o iterador for menor ou igual o número calculado o processo se repete
	while($i <= $numero){

		//arrayFatoriais recebe o resultado do fatorial de i utilizando a função fatorial declarada anteriormente
		$arrayFatoriais[] = fatorial($i);

		//i é incrementado em 1
		$i = $i + 1;
	}

	//i agora é um novo iterador
	$i = 0;

	//countArrayFatoriais: armazena a quantidade de elementos no vetor arrayFatoriais
	$countArrayFatoriais = count($arrayFatoriais);

	//enquanto o iterador i for menor que a quantidade de elementos no vertor arrayFatoriais o processo se repete
	while($i < $countArrayFatoriais){

		//numFatorial: Fatorial que está sendo calculado
		$numFatorial = $i + 1;

		//Exibiçao HTML
		//echo "<p> Fatorial de $j: $arrayFatoriais[$i]</p>";

		//Exibição terminal
		echo "Fatorial de $numFatorial: $arrayFatoriais[$i]\n";

		// o iterador i é incrementado em 1
		$i = $i + 1;
	}
}

//chama a função vetorFatoriais para o fatorial dos números de 1 a 10
vetorFatoriais(10);

//b
//echo de separação - terminal
echo "------------------------------------------------------------------\n";

function vetorPrimos($numero){

	//iterador i inicia em 1
	$i = 1;

	//arrayPrimos: array que armazena os números primos
	$arrayPrimos = array();

	//enquanto o iterador for menor ou igual o número avaliado o processo se repete
	while($i <= $numero){

		//Se a função Primo retornar true, então o array de primos recebe o número
		if(Primo($i)){
			$arrayPrimos[] = $i;
		}

		//o iterador é incrementeado em 1
		$i = $i + 1;
	}

	//i agora é um novo iterador iniciado em 0
	$i = 0;

	//countArrayPrimos
	$countArrayPrimos = count($arrayPrimos);

	//echo HTML
	//echo "<p> Números primos de 1 a $numero:</p>";

	//echo terminal
	echo "Primos de 1 a $numero:\n";

	//enquanto o iterador for menor que a quantidade primos existente então os números primos são exibidos
	while($i < $countArrayPrimos){
		echo "$arrayPrimos[$i]\n";
		
		//iterador i é incrementado em 1
		$i = $i + 1;
	}
}
//chama a função vetorPrimos para os primos entre 1 e 50
vetorPrimos(50);

//c
//echo de separação - terminal
echo "------------------------------------------------------------------";
function vetorPerfeitos($numero){

	//iterador i inicia em 1
	$i = 1;

	//arrayPerfeitos: array que irá armazenar os números perfeitos 
	$arrayPerfeitos = array();

	//enquanto o iterador i for menor ou igual o número avaliado o processo se repete
	while($i <= $numero){

		//Se a função numPerfeito, declarada anterior retornar true, então o número é armazenado no array arrayPerfeitos
		if(numPerfeito($i)){
			$arrayPerfeitos[] = $i;
		}

		//iterador i é incrementado em 1
		$i = $i + 1;
	}

	//i agora é um novo iterador
	$i = 0;

	//countArrayPerfeitos: quantidade de elementos no array de números perfeitos
	$countArrayPerfeitos = count($arrayPerfeitos);

	//echo HTML
	//echo "<p> Números perfeitos de 1 a $numero:</p>";

	//echo terminal
	echo "Números perfeitos de 1 a $numero:\n";


	//enquanto o iterador i for menor que a quantidade de números perfeitos, então o processo se repete
	while($i < $countArrayPerfeitos){

		//o número perfeito é exibido 
		echo "$arrayPerfeitos[$i]\n";

		//iterador i é incrementado em 1
		$i = $i + 1;
	}
}
//chama a funçao vetorPerfeitos para os números perfeitos entre 1 e 1000
vetorPerfeitos(1000);
?>