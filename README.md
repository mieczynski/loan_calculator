W celu testownia działania całej działającej aplikacji należy w pliku SimpleFeeCalculatorTest.php odpalić funckję
testIfFeeCalculationProposalIsCorrect.\
Dane do funkcji są dostarczane przez provider correctLoanProposalCases.\
W providerze, w konstrukotrze klasy LoanProposal wpisujemy kwotę na jaką ma być policzona prowizja, namtomiast w
konstruktorze klasy FeeCalculationProposal wpisujemy przewidywany przez nas wynik.\
Przykład:\
[new LoanProposal(1000), FeeCalculationProposal::roundingFeeCalculationProposal(new FeeCalculationProposal(50))]\
Kwota pożyczki: 1000\
Przewidywana pożyczka: 50
