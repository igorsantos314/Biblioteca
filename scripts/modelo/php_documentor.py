import os

class doc:

    def __init__(self) -> None:
        #print('Doc')
        #caminhos = [os.path.join(pasta, nome) for nome in os.listdir(pasta)]
        #arquivos = [arq for arq in caminhos if os.path.isfile(arq)]
        
        #print(listdir('scripts/modelo'))
        #print(os.getcwd())

        self.classes = {}

        self.read_arq()

    def read_arq(self):

        arq = open(f'{os.getcwd()}\scripts\modelo\cliente.php','r')

        list_docblock = []

        temp_string = ''
        read_line = False

        texto = ''
        """
        for i in arq:

            texto += i

            if '/**' in i:
                read_line = True
            
            if read_line:
                temp_string += i

            if '*/' in i:
                list_docblock.append(temp_string)
                read_line = False

                temp_string = ''

            if 'class' in i:
                self.classes.append(
                    i.split()[1].strip('{\n\t')
                )

            if 'function' in i:
                self.functions.append(
                    i.split()[2].strip('{\n\t')
                )
        """
        t = texto.split('/**')
        
        for block in t:
            print(block)

        #print(self.classes)
        #print(self.functions)
        #for i in list_docblock:
        #    print(i)
doc()