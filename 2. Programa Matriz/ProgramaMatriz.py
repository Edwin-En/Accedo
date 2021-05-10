# Segundo punto [Matriz]
# Programa realizado por Edwin Enciso [UTP]

def elementos(matriz, filas, columnas):
    numero = 0
    for inicializar in range(filas):
        matriz.append([0]*columnas)

    for i in range(filas):
        for j in range(columnas):
            matriz[i][j]= numero
            return(matriz)

def Mostrar(matriz):
    print("\nLa matriz es la siguiente: \n ")
    for i in matriz:
        print(i)

def Agregar(matriz):

    try:
        contador = 5
        while (contador > 0):
            print("\nActualmente le quedan por ingresar: ", contador, " elementos")
            print("\nIngrese la fila donde desea añadir el elemento: ")
            fila = int(input())
            print("\nIngrese la columna donde desea añadir el elemento: ")
            columna = int(input())

            if (matriz[fila-1][columna-1] == 0):        # Verificador de que la casilla esta disponible


                for i in range(10):
                    matriz[i][columna - 1] = ""   # Coloca un espacio en blanco en toda la columna
                for j in range (5):
                    matriz[fila - 1][j] = ""      # Coloca eun espacio en blanco en toda la fila
                #matriz[fila-1][columna-1] = contador
                matriz[fila-1][columna-1] = "X"
                contador = contador - 1
                Mostrar(matriz)
            else:
                print("\nCasilla no disponible, por favor seleccione otra")
    except:
        print("\nLos valores ingresados salen del rango de la matriz")



def main():

    matriz = []
    filas = 10
    columnas = 5
    print("Las casillas marcadas por un 0 significan que estan disponibles")
    elementos(matriz, filas, columnas)
    Mostrar(matriz)
    Agregar(matriz)


if __name__ == "__main__":
    main()
