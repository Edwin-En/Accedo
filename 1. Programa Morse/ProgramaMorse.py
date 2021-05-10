# Programa que codifica de Alfabeto a Morse y decodifica de Morse a Alfabeto.

# Programa realizado por Edwin Enciso [UTP]



def morsedeco(codigo):                              # Morse decodificado
    equivale={
        '.-':'A', '-...':'B', '-.-.':'C',
        '----':'CH', '-..':'D', '.':'E',
        '..-.':'F', '--.':'G', '....':'H',
        '..':'I', '.---':'J', '-.-':'K',
        '.-..':'L', '--':'M', '-.':'N',
        '--.--':'Ñ', '---':'O', '.--.':'P',
        '--.-':'Q', '.-.':'R', '...':'S',
        '-':'T', '..-':'U', '...-':'V',
        '.--':'W', '-..-':'X', '-.--':'Y',
        '--..':'Z',
        '-----':'0', '.----':'1', '..---':'2',
        '...--':'3', '....-':'4', '.....':'5',
        '-....':'6', '--...':'7', '---..':'8',
        '----.':'9',
        '.-.-.-':'.', '-.-.--':',', '..--..':'?',
        '.-..-.':'"', '--..--':'!', '   ':' ',
        ' ':' '}
    caracter=equivale[codigo]
    return(caracter)


def MorseAlfabeto():                            # Funcion que lee un mensaje en codigo morse
                                                # y lo convierte en un mensaje leible
    try:
        print("Ingrese el mensaje en codigo morse: ")
        traducido=input()


        mensaje=''
        palabras=traducido.split('   ')
        for unapalabra in palabras:
            letras=unapalabra.split(' ')
            for unaletra in letras:
                mensaje=mensaje+morsedeco(unaletra)
                mensaje=mensaje+' '

        return(mensaje)
    except:
            print("La cadena ingresada no se puede decodificar")

def AlfabetoMorse():                        # Funcion que lee un mensaje leible
                                            # y lo codifica en codigo morse
    codigo_morse = {
        "a": ".-", "b": "-...", "c": "-.-.",
        "d": "-..", "e": ".", "f": "..-.",
        "g": "--.", "h": "....", "i": "..",
        "j": "·---", "k": "-.-", "l": ".-..",
        "m": "--", "n": "-.", "ñ":
        "--.--", "o": "---", "p": ".__.",
        "q": "--.-", "r": ".-.", "s": "...",
        "t": "-", "u": "..-", "v": "...-",
        "w": ".--", "x": "-..-", "y": "-.--",
        "z": "--..",

        "0": "-----", "1": ".----", "2": "..---",
        "3": "...--", "4": "....-", "5": ".....",
        "6": "-....", "7": "--...", "8": "---..",
        "9": "----.",

        ".": ".-.-.-", ",": "-.-.--", "?": "..--..",
        "\"": ".-..-."
        }
    texto_codificado = ""
    print("Ingrese el mensaje a codificar: ")
    palabra = input()
    for c in palabra:
        if c != " " and c.lower() in codigo_morse:
            texto_codificado += codigo_morse[c.lower()]
        else:
            texto_codificado += c

    print("Mensaje Codificado: {}".format(texto_codificado))



def main():                             # Funcion principal
    try:
        print("\nBienvenido al Codificador/Decodificador de Morse \n")
        print("Pulse 1 Si desea pasar de Morse a Alfabeto")
        print("Pulse 2 Si desea pasar de Alfabeto a Morse")
        opcion = input()
        if opcion == "1":
            MensajeAlfabeto = MorseAlfabeto()
            print("Mensaje Decodificado: " + MensajeAlfabeto)
        elif opcion == "2":
            MensajeMorse = AlfabetoMorse()
        else:
            print("La opcion escogida no es valida")
    except:
        print("Error en la ejecucion del programa")

if __name__ == "__main__":
    main()
