# test_mon_script.py

import subprocess

def test_script_execution():
    try:
        # Ex�cute le script mon_script.py en utilisant subprocess.run
        result = subprocess.run(['python', 'mon_script.py'], capture_output=True, text=True)

        # V�rifie que le script s'est termin� sans erreur (returncode == 0)
        assert result.returncode == 0

        # V�rifie que le message attendu est dans la sortie standard
        assert "Le script principal s'ex�cute !" in result.stdout.strip()

        print("Test r�ussi : le script s'ex�cute correctement.")
    except AssertionError as e:
        print(f"Test �chou� : {e}")
        # Affiche la sortie d'erreur pour aider au d�bogage en cas d'�chec du test
        print(result.stderr)

if __name__ == "__main__":
    test_script_execution()

        