# Zadanie
Celem zadania jest stworzenie aplikacji pozwalającej na prosty monitoring usług internetowych.

## W trakcie spotkania całego zespołu spisano następujące wymagania
* Aplikacja pozwala na zdefiniowanie wielu usług, które podlegają monitorowaniu
* Konfiguracja usług monitorowanych odbywa się poprzez dodanie odpowiednich wpisów w pliku konfiguracyjnym
* Konfiguracja polegać będzie na zdefiniowaniu danych takich jak
  * nazwa usługi
  * adres url usługi
  * listy testów sprawdzających takich jak np. statusu odpowiedzi, nagłówek Content-Type i może wyglądać następująco:

```
serwis1:
  name: Serwis pierwszy
  url: https://example.com/test.html
  tests:
    - assert.http-status-200
    - assert.http-header-html
```
* Jeśli którykolwiek test zwróci błąd, to aplikacja przyjmuje że serwis nie działa
* Wynik testu zapisywany jest do bazy wraz z datą jego wykonania oraz z informacją, który test wygenerowała błąd
* Baza danych przetrzymuje pełną historię wykonanych testów
* Aplikacja nie posiada interfejsu graficznego, a sterowanie odbywa się za pomocą konsoli
* Uruchomienie sprawdzania odbywa się za pomocą komendy. I uruchamiana przez crona. Komenda pozwala ona na wybranie testowanej usługi lub wszystkich naraz.
* Sprawdzanie wyników odbywa się poprzez uruchomienie odpowiedniej komendy, która generuje w postaci tabelki ostatni wynik testu dla każdej usługi. Tabelka zawiera następujące kolumny
  * nazwa usługi
  * data testu
  * wynik testu
  * test, który wygenerował błąd

## Zespół zdefiniował następujące kierunki rozwoju
* Lista możliwych testów jak i usług będzie się rozrastać
* Aplikacja będzie w przyszłości mogła monitorować usługi inne iż WWW np. FTP
* Wykonanie niektórych testów jest bardzo czasochłonne ze względu na czas odpowiedzi. Trzeba przygotować aplikację na wykonywanie testów w sposób asychroniczny
* Z czasem serwisów będzie przybywać co spowoduje potrzebę skalowania aplikacji na kilka serwerów.
* Aplikacja zostanie w przyszłości rozbudowana, o możliwość wysyłki powiadomień na maila w przypadku wykrycia niedziałającej usługi oraz o logowanie bardziej szczegółowych informacji dotyczących testu do zewnętrznego systemu zbierania logów.
* W przyszłości powstanie panel administracyjny gdzie będzie można  konfigurować testy. Pozwoli to na zrezygnowanie z pliku konfiguracyjnego.

## Komentarz
* Zadanie możesz wykonać przy użyciu dowolnych narzędzi, chociaż preferowany jest framework Symfony
* Twoim zadaniem jest wykonać aplikację spełniającą tylko podstawowe zadania (MVP)
* Wybierz architekturę pozwalająca na łatwe wprowadzenie kolejnych zaplanowanych funkcjonalności
* Trzymaj się zasad czystego kodu
* Jeśli napiszesz kod uproszczony, który można napisać lepiej ale dla potrzeb MVP wg Ciebie nie ma sensu to opisz to w komentarzu.
* Jeśli masz swoje przemyślenia, jakie rozwiązania można by wprowadzić w przyszłości, lub inne komentarze to napisz je w README.

## Uwaga
* Srodowisko uruchomieniowe zostało utworzone na bazie projektu https://github.com/dunglas/symfony-docker, https://symfony.com/doc/current/setup/docker.html.
* Jeśli chcesz zastosować inne środowisko uruchomieniowe to możesz to zrobić.


