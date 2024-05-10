<?php

namespace Database\Seeders;

use App\Models\Local;
use Illuminate\Database\Seeder;

class Origens extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /* DEPARTAMENTOS */

        Local::create([

            'externo' => 0,
            'desc' => 'Secretaria executiva',
        ]);
        Local::create([

            'externo' => 0,
            'desc' => 'Chefia do gabinete',
        ]);
        Local::create([

            'externo' => 0,
            'desc' => 'Conselho Municipal de Educação - CME',
        ]);
        Local::create([

            'externo' => 0,
            'desc' => 'Diretoria de Avaliação e Monitoramento',
        ]);
        Local::create([

            'externo' => 0,
            'desc' => 'Diretoria de Ensino e Aprendizagem',
        ]);
        Local::create([

            'externo' => 0,
            'desc' => 'Diretoria de Gestão Educacional',
        ]);
        Local::create([

            'externo' => 0,
            'desc' => 'Diretoria de Gestão Administrativa',
        ]);
        Local::create([

            'externo' => 1,
            'desc' => 'Outra',
        ]);
        Local::create([

            'externo' => 0,
            'desc' => 'Diretoria de Gestão de Pessoas',
        ]);
        Local::create([

            'externo' => 0,
            'desc' => 'Diretoria de Planejamento',
        ]);

        // Setores e Coordenadorias
        // Setore da Chefia do gabinete
        Local::create([
            'externo' => 0,
            'desc' => 'Assessoria de Comunicação',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Assessoria Jurídica',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Ouvidoria',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Universidade Aberta do Brasil - UAB',
        ]);
        // Setores do CME
        Local::create([
            'externo' => 0,
            'desc' => 'Assessoria Tecnica ao CME e Conselhos vinculados',
        ]);
        // Setores de Avaliação e Monitoramento
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Avaliações educacionais',
        ]);
        // Setore da Diretoria de Ensino e Aprendizagem
        Local::create([
            'externo' => 0,
            'desc' => 'Coordenadoria de Desenvolvimento do Currículo',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Coordenadoria do Mais Paic e Educação Digital',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Coordenadoria de Ações Complementares',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Educação Infantil',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Ensino Fundamental (1° e 2° anos)',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Ensino Fundamental (3° a 5° anos)',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Ensino Fundamental (6° e 9° anos)',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Educação Especial Inclusiva',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Educação de Jovens e Adultos',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Setor de Educação Digital e Apoio a Formação',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Setor de Suporte a Gestão Escolar',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Suporte a mediação da relação Escola/Comunidade',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Setor de Projetos e Ações Educacionais',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Suporte as Escolas Cívico-Militares',
        ]);
        // Setores da diretoria de Gestão educacional
        Local::create([
            'externo' => 0,
            'desc' => 'Setor de Alimentação Escolar',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Setor de Apoio ao Educando',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Setor de Suporte as Creches Contratadas',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Setor de Administração Escolar',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Estatística Educacional',
        ]);
        // Setores da diretoria de gestão administrativa
        Local::create([
            'externo' => 0,
            'desc' => 'Coordenadoria Administrativa',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Setor de Engenharia',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Patrimonio',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Almoxarifado',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Transportes',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Setor de Manutenção e Segurança do Parque Escolar',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Recepção / Portaria / Vigilancia',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Protocolo',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Serviços Gerais',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Reprografia',
        ]);
        Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Arquivo',
        ]);
        // Setores da diretoria de gestao de pessoas
        Local::create([
            'externo' => 0,
            'desc' => 'Coordenadoria de Gestão de Pessoas',
        ]);Local::create([
            'externo' => 0,
            'desc' => 'Setor de Assessoria Especial de Promoção a Saúde do Profissional do Magistério',
        ]);Local::create([
            'externo' => 0,
            'desc' => 'Setor de Direitos e Vantagens',
        ]);Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Suprimento e Movimentação',
        ]);Local::create([
            'externo' => 0,
            'desc' => 'Unidade de Avaliação de Desempenho',
        ]);
        // Setores da diretoria de planejamento
        Local::create([
            'externo' => 0,
            'desc' => 'Coordenadoria de Planejamento e Controle',
        ]);Local::create([
            'externo' => 0,
            'desc' => 'Setroe de Planejamento Financeiro, Orçamentário e Controle Interno',
        ]);Local::create([
            'externo' => 0,
            'desc' => 'Setor de Instrução de Processos',
        ]);Local::create([
            'externo' => 0,
            'desc' => 'Setor de Congregação dos Conselhos Escolares',
        ]);Local::create([
            'externo' => 0,
            'desc' => 'Setor de Suporte Tecnico as Unidades Executoras',
        ]);Local::create([
            'externo' => 0,
            'desc' => 'Setor de Apoio as Unidades Executoras sem Gestor Financeiro',
        ]);Local::create([
            'externo' => 0,
            'desc' => 'Setor de Planejamento de Politicas Públicas em Educação',
        ]);Local::create([
            'externo' => 0,
            'desc' => 'Setor de Tecnologia da Informação e Modernização Administrativa',
        ]);



        /* ESCOLAS */


        Local::create(['externo' => 1, 'desc' => 'OUTRO']);
        Local::create(['externo' => 1, 'desc' => 'TANCREDO NEVES PRESIDENTE EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'TANCREDO NEVES PRESIDENTE ECIM']); //OK
        Local::create(['externo' => 1, 'desc' => 'FRANCISCA FLORENCIA DA SILVA PROF° EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'ALMIR FREITAS DUTRA EMEIEF PREFEITO']); //OK
        Local::create(['externo' => 1, 'desc' => 'POVO PITAGUARI EMIEB']); //OK
        Local::create(['externo' => 1, 'desc' => 'ANTONIO GONDIM DE LIMA EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'BRAZ RIBEIRO DA SILVA EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'CARLOS JEREISSATI SEN EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'CESAR CALS DE OLIVEIRA FILHO EMEIEF GOVERNADOR']); //OK
        Local::create(['externo' => 1, 'desc' => 'CESAR CALS NETO EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'DURVAL AIRES JORNALISTA EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'EDWIRGES SANTA EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'EVANDRO AYRES DE MOURA EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'FRANCISCO ANTONIO FONTENELE EMEIEF ']); //OK
        Local::create(['externo' => 1, 'desc' => 'FRANCISCO BARBOSA COMISSARIO EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'GENCIANO GUERREIRO DE BRITO EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'JATOBA EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'JOAQUIM AGUIAR EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'JOSE BELISARIO DE SOUSA EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'JOSE DE BORBA VASCONCELOS DR EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'JOSE DE BORBA VASCONCELOS DR ECIM']); //OK
        Local::create(['externo' => 1, 'desc' => 'JOSE MARIA BARROS PINHO PROFESSOR EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'SAO JOSE INSTITUTO EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'JOSE MARIO BARBOSA EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'JOSE NOGUEIRA MOTA EMEIFE']); //OK
        Local::create(['externo' => 1, 'desc' => 'LICEU DE MARACANAU EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'MARIA PEREIRA DA SILVA EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'MANOEL GOMES DE MORAIS EMEIEF']);
        Local::create(['externo' => 1, 'desc' => 'MANOEL MOREIRA LIMA EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'MANOEL ROSEO LANDIM EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'MARILENE LOPES RABELO PROF° EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'MARIA DA CONCEICAO PESSOA COELHO CENTRO DE EDUCACAO INFANTIL']); //OK
        Local::create(['externo' => 1, 'desc' => 'MIRIAN PORTO MOTA CRECHE MUNICIPAL']); //OK
        Local::create(['externo' => 1, 'desc' => 'ADAUTO FERREIRA LIMA EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'NAPOLEAO BONAPARTE VIANA EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'NORBERTO ALVES BATALHA EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'PARQUE PIRATININGA EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'RODOLFO TEOFILO EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'RUI BARBOSA EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'ULYSSES GUIMARAES DEPUTADO EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'VALDENIA ACELINO DA SILVA EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'ALMIR FREITAS DUTRA PREF EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'ANTONIO DE ALBUQUERQUE SOUSA FILHO EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'LUIZ GONZAGA DOS SANTOS EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'CENTRO DE EDUCACAO DE JOVENS E ADULTOS DE MARACANAU']); //OK
        Local::create(['externo' => 1, 'desc' => 'CENTRO DE EDUCACAO DE JOVENS E ADULTOS DE PAJUCARA']); //OK
        Local::create(['externo' => 1, 'desc' => 'CENTRO INTEGRADO DE EDUCACAO SAUDE E ASSISTENCIA SOCIAL DE MARACANAU']); //OK
        Local::create(['externo' => 1, 'desc' => 'MARIA DE LOURDES SILVA PROFESSORA EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'APRENDER PENSANDO EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'SINFRONIO PEIXOTO DE MORAIS EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'JOSE MARTINS RODRIGUES DEPUTADO EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'RACHEL DE QUEIROZ EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'WALMIKI SAMPAIO DE ALBUQUERQUE EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'MANOEL RODRIGUES PINHEIRO DE MELO EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'RAIMUNDO NOGUEIRA DA COSTA EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'ALEGRIA CULTURAL EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'PENSANDO E CONSTRUINDO EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'INTEGRANDO O SABER EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'CONSTRUINDO O SABER EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'CONSTRUINDO O SABER MARIA ISIS MENEZES ANDRADE EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'ENEIDA SOARES PESSOA CENTRO MUNICIPAL DE EDUCACAO PROFISSIONAL']); //OK
        Local::create(['externo' => 1, 'desc' => 'JULIO CESAR COSTA LIMA I EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'JOAO MAGALHAES DE OLIVIERA EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'ELIAS SILVA OLIVEIRA EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'ELSA MARIA LAUREANO PEREIRA CENTRO DE EDUCACAO INFANTIL']); //OK
        Local::create(['externo' => 1, 'desc' => 'MARIA ROCHELLE DA SILVA EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'OSMIRA EDUARDO DE CASTRO CRECHE']); //OK
        Local::create(['externo' => 1, 'desc' => 'HEITOR VILLA LOBOS EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'CORA CORALINA - EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'VINICIUS DE MORAIS EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'HERBERT JOSE DE SOUZA BETINHO EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'HUMBERTO BEZERRA CORONEL CENTRO DE EDUCACAO INFANTIL']); //OK
        Local::create(['externo' => 1, 'desc' => 'DULCE IRMA EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'MARIA MARQUES DO NASCIMENTO EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'JOSE DANTAS SOBRINHO EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'TEREZA DE CALCUTA EMEF MADRE']); //OK
        Local::create(['externo' => 1, 'desc' => 'CARLOS DRUMMOND DE ANDRADE EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'HELDER PESSOA CAMARA DOM EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'ELEAZAR DE CARVALHO MAESTRO EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'MARIO COVAS GOVERNADOR EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'EDSON QUEIROZ EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'MARIA JOSE ISIDORO PROF° EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'LUIS CARLOS PRESTES EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'ADELIA SANTOS DE SOUSA PROF° EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'ELIAN DE AGUIAR MENDES EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'NARCISO PESSOA DE ARAUJO EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'FRANCISCO OSCAR RODRIGUES PROF° EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'MARIA DO SOCORRO VIANA FREITAS PROF° EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'NORMA CELIA PINHEIRO CRISPIM PROF° EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'CEZARINA DE OLIVEIRA GOMES PROF° EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'FRANCISCO ARAUJO DO NASCIMENTO PROF° EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'FRANCISCO TABOZA FILHO EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'MARIA DE JESUS DE SOUSA MACAMBIRA PROF° EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'PAULO FREIRE PROF° EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'MARIA MARQUES CEDRO PROF° EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'MARIA GLAUCIA MENEZES TEIXEIRA ALBUQUERQUE PROF° EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'ANA BEATRIZ MACEDO TAVARES MARQUES ESTUDANTE EMEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'JOSE ASSIS DE OLIVEIRA EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'MARIA JOSE HOLANDA DO VALE PROF° EMEIEF']); //OK
        Local::create(['externo' => 1, 'desc' => 'NOSSA SENHORA DE FÁTIMA CHECHE MUNICIPAL']); //OK
        Local::create(['externo' => 1, 'desc' => 'PGM']);
        Local::create(['externo' => 1, 'desc' => 'SRHP']);
        Local::create(['externo' => 1, 'desc' => 'PREFEITURA DE MARACANAÚ']);
    }
}
